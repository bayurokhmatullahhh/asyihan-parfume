<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NumerologyLead;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard overview with real-time analytics from database.
     */
    public function index(): View
    {
        // === KPI Metrics (all real data from DB) ===
        $totalRevenue = (int) Order::where('status', '!=', 'cancelled')->sum('total_price');
        $totalOrders = Order::count();
        $totalFlacon = (int) Order::where('status', '!=', 'cancelled')->sum('quantity');
        $totalLeads = NumerologyLead::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalProducts = Product::where('is_active', true)->count();

        // Average order value
        $paidOrdersCount = Order::where('status', '!=', 'cancelled')->count();
        $averageOrderValue = $paidOrdersCount > 0 ? (int) round($totalRevenue / $paidOrdersCount) : 0;

        // Revenue growth: this week vs last week
        $thisWeekRevenue = (int) Order::where('status', '!=', 'cancelled')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('total_price');
        $lastWeekRevenue = (int) Order::where('status', '!=', 'cancelled')
            ->whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])
            ->sum('total_price');
        $revenueGrowth = $lastWeekRevenue > 0
            ? round(($thisWeekRevenue - $lastWeekRevenue) / $lastWeekRevenue * 100, 1)
            : ($thisWeekRevenue > 0 ? 100.0 : 0.0);

        // Flacon growth: this week vs last week
        $thisWeekFlacon = (int) Order::where('status', '!=', 'cancelled')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('quantity');
        $lastWeekFlacon = (int) Order::where('status', '!=', 'cancelled')
            ->whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])
            ->sum('quantity');
        $flaconGrowth = $lastWeekFlacon > 0
            ? round(($thisWeekFlacon - $lastWeekFlacon) / $lastWeekFlacon * 100, 1)
            : ($thisWeekFlacon > 0 ? 100.0 : 0.0);

        // Conversion rate: total orders generated / total leads captured
        $conversionRate = $totalLeads > 0
            ? round($totalOrders / $totalLeads * 100, 1)
            : 0.0;

        // New users registered this week
        $newUsersThisWeek = User::where('role', 'user')
            ->where('created_at', '>=', Carbon::now()->startOfWeek())
            ->count();

        // Fulfillment rate: delivered/completed orders vs total
        $deliveredOrders = Order::whereIn('status', ['delivered', 'completed'])->count();
        $fulfillmentRate = $totalOrders > 0 ? round($deliveredOrders / $totalOrders * 100, 1) : 0.0;

        // === Recent data ===
        $recentOrders = Order::with('user')->latest()->take(6)->get();
        $recentLeads = NumerologyLead::latest()->take(6)->get();

        // === Orders by status for status distribution ===
        $statusCounts = Order::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->all();

        // === 7-day revenue chart data (real daily breakdown) ===
        $days = collect();
        $revenueData = collect();
        $ordersCountData = collect();

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $days->push($date->isoFormat('ddd, D MMM'));

            $dayRevenue = Order::whereDate('created_at', $date)
                ->where('status', '!=', 'cancelled')
                ->sum('total_price');

            $dayOrders = Order::whereDate('created_at', $date)->count();

            $revenueData->push((int) $dayRevenue);
            $ordersCountData->push((int) $dayOrders);
        }

        // === Top products by sales volume (for doughnut chart) ===
        $topProducts = OrderItem::select('product_name', DB::raw('SUM(quantity) as total_qty'))
            ->groupBy('product_name')
            ->orderByDesc('total_qty')
            ->take(5)
            ->get();

        // === Top Archetypes Leads distribution ===
        $topArchetypes = NumerologyLead::select('archetype_name', DB::raw('count(*) as count'))
            ->groupBy('archetype_name')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        // === Recent registered users with real order stats ===
        $recentUsers = User::where('role', 'user')
            ->withCount(['orders' => function ($query) {
                $query->where('status', '!=', 'cancelled');
            }])
            ->with(['orders' => function ($query) {
                $query->where('status', '!=', 'cancelled')->latest();
            }])
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($user) {
                $user->total_spent = $user->orders->sum('total_price');
                $user->last_order = $user->orders->first();

                return $user;
            });

        // === Low stock product alerts ===
        $lowStockProducts = Product::where('stock', '<=', 15)
            ->where('is_active', true)
            ->orderBy('stock')
            ->take(3)
            ->get();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'totalFlacon',
            'totalLeads',
            'totalUsers',
            'totalProducts',
            'averageOrderValue',
            'revenueGrowth',
            'flaconGrowth',
            'conversionRate',
            'newUsersThisWeek',
            'fulfillmentRate',
            'recentOrders',
            'recentLeads',
            'statusCounts',
            'days',
            'revenueData',
            'ordersCountData',
            'topProducts',
            'topArchetypes',
            'recentUsers',
            'lowStockProducts'
        ));
    }
}

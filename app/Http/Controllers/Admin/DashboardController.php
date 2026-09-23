<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NumerologyLead;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard overview with charts and analytics.
     */
    public function index(): View
    {
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total_price');
        $totalOrders = Order::count();
        $totalLeads = NumerologyLead::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalProducts = Product::count();

        // Recent data
        $recentOrders = Order::latest()->take(6)->get();
        $recentLeads = NumerologyLead::latest()->take(6)->get();

        // Orders by status
        $statusCounts = Order::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->all();

        // 7-day revenue chart data
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

        // Top Archetypes Leads distribution
        $topArchetypes = NumerologyLead::select('archetype_name', DB::raw('count(*) as count'))
            ->groupBy('archetype_name')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'totalLeads',
            'totalUsers',
            'totalProducts',
            'recentOrders',
            'recentLeads',
            'statusCounts',
            'days',
            'revenueData',
            'ordersCountData',
            'topArchetypes'
        ));
    }
}

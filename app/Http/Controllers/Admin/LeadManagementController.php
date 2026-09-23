<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NumerologyLead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadManagementController extends Controller
{
    /**
     * Display a listing of numerology leads captured from the calculator.
     */
    public function index(Request $request): View
    {
        $query = NumerologyLead::latest();

        if ($request->filled('archetype')) {
            $query->where('archetype_name', $request->archetype);
        }

        if ($request->filled('core_number')) {
            $query->where('core_number', $request->core_number);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $leads = $query->paginate(20)->withQueryString();

        $archetypes = NumerologyLead::select('archetype_name')
            ->distinct()
            ->pluck('archetype_name');

        return view('admin.leads.index', compact('leads', 'archetypes'));
    }

    /**
     * Remove the specified lead.
     */
    public function destroy(NumerologyLead $lead): RedirectResponse
    {
        $name = $lead->full_name;
        $lead->delete();

        return redirect()->route('admin.leads.index')->with('success', "Data aura {$name} berhasil dihapus dari arsip.");
    }
}

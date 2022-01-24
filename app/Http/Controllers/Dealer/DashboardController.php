<?php

namespace App\Http\Controllers\Dealer;

use Gate;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Lead;
use Exception;

class DashboardController extends Controller
{
    public function index()
    {

        $totalLeads = Lead::where('assigned_to_user_id', auth()->user()->id)->count();
        $openLeads = Lead::where('assigned_to_user_id', auth()->user()->id)->whereHas('status', function ($query) {
            $query->whereName('Open');
        })->count();
        $closedLeads = Lead::where('assigned_to_user_id', auth()->user()->id)->whereHas('status', function ($query) {
            $query->whereName('Closed');
        })->count();

        return view('dealer.dashboard.index', compact('totalLeads', 'openLeads', 'closedLeads'));
    }
}

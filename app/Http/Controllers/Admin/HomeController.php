<?php

namespace App\Http\Controllers\Admin;

use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Lead;

class HomeController
{
    public function index()
    {
        abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $totalLeads = Lead::count();
        $openLeads = Lead::whereHas('status', function ($query) {
            $query->whereName('Open');
        })->count();
        $closedLeads = Lead::whereHas('status', function ($query) {
            $query->whereName('Closed');
        })->count();

        return view('home', compact('totalLeads', 'openLeads', 'closedLeads'));
    }
}

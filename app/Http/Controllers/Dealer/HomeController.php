<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth', 'verified']);
    }

    /**
     * front home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function completeprofile()
    {
        return view('dealer.completeprofile');
    }

    /**
     * front home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function completeprofilesave(Request $request)
    {
    }
}

<?php

namespace App\Http\Controllers;

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
        //$this->middleware('auth');
    }

    /**
     * front home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public  function compare()
    {
        return view('compare');
    }

    public  function tax()
    {
        return view('tax');
    }

    public  function about()
    {
        return view('about');
    }
    public  function termsofuse()
    {
        return view('termsofuse');
    }
    public  function privacypolicy()
    {
        return view('privacypolicy');
    }

    public function glossary()
    {
        return view('glossary');
    }

    public function career()
    {
        return view('career');
    }
}

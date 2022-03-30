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

    public function ev()
    {
        return view('ev');
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
        return view('frontend.aboutus');
    }

    public  function solutions()
    {
        return view('frontend.solutions');
    }
    public  function solutionssolar()
    {
        return view('frontend.solutionssolar');
    }
    public  function solutionsbattery()
    {
        return view('frontend.solutionsbattery');
    }

    public function contact(Request $request)
    {
        if ($request->post()) {

            $request->validate([
                'comment_text' => 'required'
            ]);

            /*$comment = $lead->comments()->create([
                'author_name'   => $lead->author_name,
                'author_email'  => $lead->author_email,
                'comment_text'  => $request->comment_text
            ]);*/

            //$lead->sendCommentNotification($comment);

            return redirect()->back()->withStatus('Thank you for contact us. One of representative will call you shortly');
        }
        return view('frontend.contact');
    }

    /*public  function about()
    {
        return view('about');
    }*/
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

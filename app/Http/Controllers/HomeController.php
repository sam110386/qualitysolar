<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\EnquiryNotification;
use App\Notifications\ContactNotification;
use App\Notifications\SubscribeNotification;
use Illuminate\Support\Facades\Notification;

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
                'name' => 'required',
                'email' => 'email|required',
                'subject' => 'required',
                'message' => 'required'
            ]);
            $notification = new ContactNotification($request);
            Notification::route('mail', env('ADMIN_EMAIL'))->notify($notification);
            return redirect('thank-you')->withStatus('Thank you for contact us. One of representative will call you shortly');
        }
        return view('frontend.contact');
    }
    public function enquiry(Request $request)
    {
        if ($request->post()) {
            $request->validate([
                'name' => 'required',
                'email' => 'email|required',
                'phone' => 'required|min:10|max:16',
                'regarding' => 'required'
            ]);

            $notification = new EnquiryNotification($request);
            Notification::route('mail', env('ADMIN_EMAIL'))->notify($notification);
            return redirect('thank-you')->withStatus('Thank you for contact us. One of representative will call you shortly');
        }
        return redirect()->back();
    }

    public function subscibe(Request $request)
    {
        if ($request->post()) {
            $request->validate([
                'name' => 'required',
                'email' => 'email|required'
            ]);

            $notification = new SubscribeNotification($request);
            Notification::route('mail', env('ADMIN_EMAIL'))->notify($notification);
            return redirect('thank-you')->withStatus('Thank you for contact us. One of representative will call you shortly');
        }
        return redirect()->back();
    }

    public  function thankyou()
    {
        return view('frontend.thankyou');
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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ResidentialLeadNotification;
use App\Notifications\CommercialLeadNotification;
use Illuminate\Support\Facades\Notification;

class QuoteController extends Controller
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
        return view('quote.index');
    }

    public function quotestart(Request $request)
    {
        $params = $request->quote;
        if (empty($params)) {
            return redirect('/quote');
        }
        $makemodel = config('product.makemodel');
        if ($params == 'Residential') {

            return view('quote.residential', ["make" => array_keys($makemodel), "makemodel" => $makemodel, 'usstates' => config('product.usstates')]);
        }
        return view('quote.commercial', ["make" => array_keys($makemodel), "makemodel" => $makemodel, 'usstates' => config('product.usstates')]);
    }


    public  function residential(Request $request)
    {
        Notification::route('mail', [
            env('ADMIN_EMAIL') => 'Vehya',
        ])->notify(new ResidentialLeadNotification($request->all()));
        return redirect('/thankyou');
    }

    public function commercial(Request $request)
    {

        Notification::route('mail', [
            env('ADMIN_EMAIL') => 'Vehya',
        ])->notify(new CommercialLeadNotification($request->all()));
        return redirect('/thankyou');
    }

    public  function thankyou()
    {
        return view('quote.thankyou');
    }
}

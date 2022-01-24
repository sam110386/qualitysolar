<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ResidentialLeadNotification;
use App\Notifications\CommercialLeadNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Lead;

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
        $lead = new Lead();
        $lead->fname = $request->contact_info_first_name;
        $lead->lname = $request->contact_info_last_name;
        $lead->email = $request->contact_info_email;
        $lead->phone = $request->contact_info_phone;
        $lead->make = $request->Brand;
        $lead->model = $request->Modal;
        $lead->ev_charger_type = $request->ev_chargers_type;
        $lead->expected_install_days = $request->looking_to_install_your_EV_charger;
        $lead->address = $request->address;
        $lead->state = $request->taxstate;
        $lead->quote = 100;
        $lead->questions = json_encode($request->all());
        $lead->category_id = 1;
        $lead->status_id = 1;
        $lead->save();

        Notification::route('mail', [
            env('ADMIN_EMAIL') => 'Vehya',
        ])->notify(new ResidentialLeadNotification($request->all()));
        return redirect('/thankyou');
    }

    public function commercial(Request $request)
    {

        $lead = new Lead();
        $lead->fname = $request->contact_info_first_name;
        $lead->lname = $request->contact_info_last_name;
        $lead->email = $request->contact_info_email;
        $lead->phone = $request->contact_info_phone;
        $lead->address = $request->address;
        $lead->state = $request->taxstate;
        $lead->expected_install_days = $request->looking_to_install_your_EV_charger;
        $lead->quote = 100;
        $lead->questions = json_encode($request->all());
        $lead->category_id = 2;
        $lead->status_id = 1;
        $lead->save();

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

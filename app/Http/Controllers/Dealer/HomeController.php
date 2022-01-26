<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

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
        $dealer = auth()->user();
        $user = User::find($dealer->id);
        return view('dealer.completeprofile', ["user" => $user]);
    }


    /**
     * front home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function completeprofilesave(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'company_name' => 'required',
            'address'   => 'required',

            'driver_license' => 'required|mimes:docx,txt,doc,pdf,jpg,png|max:4096',
            'electrician_license' => 'required|mimes:docx,txt,doc,pdf,jpg,png|max:4096',
            'vehicle_insurance' => 'required|mimes:docx,txt,doc,pdf,jpg,png|max:4096',
            'liability_insurance' => 'required|mimes:docx,txt,doc,pdf,jpg,png|max:4096',
            'master_agreement' => 'mimes:docx,txt,doc,pdf,jpg,png|max:4096',
            'evcharger_certification' => 'mimes:docx,txt,doc,pdf,jpg,png|max:4096',
            'w9_certification' => 'mimes:docx,txt,doc,pdf,jpg,png|max:4096',

        ]);
        try {
            $dealer = auth()->user();
            $userObj = User::find($dealer->id);
            $userObj->description = $request->description;
            $userObj->company_name = $request->company_name;
            $userObj->address = $request->address;
            $userObj->ein = $request->ein;
            $userObj->poc = $request->poc;

            if ($request->file('driver_license')) {
                $fileName = time() . '_' . $request->file('driver_license')->getClientOriginalName();
                $filePath = $request->file('driver_license')->storeAs('uploads/users', $fileName, 'public');
                $userObj->driver_license = time() . '_' . $request->file('driver_license')->getClientOriginalName();
            }
            if ($request->file('electrician_license')) {
                $fileName = time() . '_' . $request->file('electrician_license')->getClientOriginalName();
                $filePath = $request->file('electrician_license')->storeAs('uploads/users', $fileName, 'public');
                $userObj->electrician_license = time() . '_' . $request->file('electrician_license')->getClientOriginalName();
            }
            if ($request->file('vehicle_insurance')) {
                $fileName = time() . '_' . $request->file('vehicle_insurance')->getClientOriginalName();
                $filePath = $request->file('vehicle_insurance')->storeAs('uploads/users', $fileName, 'public');
                $userObj->vehicle_insurance = time() . '_' . $request->file('vehicle_insurance')->getClientOriginalName();
            }
            if ($request->file('liability_insurance')) {
                $fileName = time() . '_' . $request->file('liability_insurance')->getClientOriginalName();
                $filePath = $request->file('liability_insurance')->storeAs('uploads/users', $fileName, 'public');
                $userObj->liability_insurance = time() . '_' . $request->file('liability_insurance')->getClientOriginalName();
            }
            if ($request->file('master_agreement')) {
                $fileName = time() . '_' . $request->file('master_agreement')->getClientOriginalName();
                $filePath = $request->file('master_agreement')->storeAs('uploads/users', $fileName, 'public');
                $userObj->master_agreement = time() . '_' . $request->file('master_agreement')->getClientOriginalName();
            }
            if ($request->file('evcharger_certification')) {
                $fileName = time() . '_' . $request->file('evcharger_certification')->getClientOriginalName();
                $filePath = $request->file('evcharger_certification')->storeAs('uploads/users', $fileName, 'public');
                $userObj->evcharger_certification = time() . '_' . $request->file('evcharger_certification')->getClientOriginalName();
            }
            if ($request->file('w9_certification')) {
                $fileName = time() . '_' . $request->file('w9_certification')->getClientOriginalName();
                $filePath = $request->file('w9_certification')->storeAs('uploads/users', $fileName, 'public');
                $userObj->w9_certification = time() . '_' . $request->file('w9_certification')->getClientOriginalName();
            }
            $userObj->save();
            return redirect()->route('dealer.thank-you');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function thankyou()
    {
        return view('dealer.thankyou');
    }
}

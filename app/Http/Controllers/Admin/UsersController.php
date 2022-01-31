<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::whereHas("roles", function ($q) {
            $q->where("title", "Dealer");
        })->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $userObj = new User();
        $userObj->name = $request->name;
        $userObj->email = $request->email;
        $userObj->phone = $request->phone;
        $userObj->description = trim($request->description);
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
        $userObj->roles()->sync(2);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $userObj = User::FindOrFail($id);
        $userObj->name = $request->name;
        $userObj->email = $request->email;
        $userObj->phone = $request->phone;
        $userObj->description = trim($request->description);
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
        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function status(User $user, $status)
    {

        $user->is_approved = ($status ? 0 : 1);
        $user->save();
        //update agents
        User::where('parent_id', $user->id)
            ->update(['is_approved' => ($status ? 0 : 1)]);
        return back();
    }
    public function verify(User $user, $verify)
    {

        $user->email_verified_at = ($verify ? NULL : date('Y-m-d H:i:s'));
        $user->save();
        return back();
    }
}

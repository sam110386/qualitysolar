<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentsController extends Controller
{
    public function index()
    {

        $users = User::where('parent_id', auth()->user()->id)->whereHas("roles", function ($q) {
            $q->where("title", "Agent");
        })->get();

        return view('dealer.agents.index', compact('users'));
    }

    public function create()
    {
        return view('dealer.agents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'email'       => 'required',
            'phone' => 'required',
            'password'   => 'required'
        ]);
        $dataToSave = $request->all();
        $dataToSave['is_approved'] = 1;
        $dataToSave['parent_id'] = auth()->user()->id;
        $dataToSave['email_verified_at'] = date('Y-m-d H:i:s');
        $user = User::create($dataToSave);
        $user->roles()->sync(3);

        return redirect()->route('dealer.agents.index');
    }

    public function edit($id)
    {
        $user = User::where('parent_id', auth()->user()->id)->where('id', $id)->firstOrFail();
        return view('dealer.agents.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name'         => 'required',
            'email'       => 'required',
            'phone' => 'required',
            'password'   => 'required'
        ]);
        $dataToSave = $request->all();
        $dataToSave['is_approved'] = 1;
        $dataToSave['parent_id'] = auth()->user()->id;
        $dataToSave['email_verified_at'] = date('Y-m-d H:i:s');
        $userObj = User::FindOrFail($id);
        $userObj->save();
        return redirect()->route('dealer.agents.index');
    }

    public function show(User $user)
    {
        return view('dealer.agents.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::where('parent_id', auth()->user()->id)->whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function status(User $user, $status)
    {

        $user->is_approved = ($status ? 0 : 1);
        $user->save();
        return back();
    }
}

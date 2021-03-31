<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }

    public function edit($id)
    {
//        $user_id = Auth::id();
        $user = User::find($id);

        return response()->view("user.edit", [
            "user" => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect(route('users.edit', $user->id))->with('account-update-status', 'アカウント情報を更新しました');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}

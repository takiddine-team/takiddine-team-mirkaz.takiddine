<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        $done = config('done');
        return view('users.create',compact('done'));
    }
    public function store(Request $request)
    {

        $permissions = json_encode($request->permission??[]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'permissions' => $permissions,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->route('users.index');
    }
    public function edite($id)
    {
        $done = config('done');

        $user = User::where('id', $id)->first();
        $permissions = json_decode($user->permissions);
        return view('users.edit', compact('user','done','permissions'));
    }
    public function update(Request $request, $id)
    {
        $permissions = json_encode($request->permission);
        isset($request->password) ?  $password = Hash::make($request->password) :$password = User::where('id',$id)->first()->password;

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'permissions' => $permissions,
            'password' => $password

        ]);
        return redirect()->route('users.index');
    }
    public function delete($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('users.index');
    }
}

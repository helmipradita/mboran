<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function create() 
    {
        return view('dashboard.user.create', [
            'roles' => Role::get(),
            'users' => User::has('roles')->get(),
        ]);
    }

    public function store() 
    {
        $user = User::where('username', request('username'))->first();
        $user->assignRole(request('roles'));
        // dd($user);
        return back()->with('success', "User {$user->username} has been assign role!");
    }

    public function edit(User $user) 
    {
        return view('dashboard.user.edit', [
            'user' => $user,
            'roles' => Role::get(),
            'users' => User::has('roles')->get(),
        ]);
    }

    public function update(User $user) 
    {
        $user->syncRoles(request('roles'));
        return redirect()->route('user.create')->with('info', "User <b>{$user->username}</b> has been synced role!");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboards.admins.index',[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.admins.create',[
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:users',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|max:255',
            'role' => 'max:255',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        //menyimpan ke db
        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'New user has been created !');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboards.admins.edit',[
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'password' => 'required|max:255',
            'role' => 'max:255'
        ];

        if($request->email != $user->email) {
            $rules['email'] = 'required|max:255|unique:users';
        }
        if($request->username != $user->username) {
            $rules['username'] = 'required|max:255|unique:users';
        }

        $validatedData = $request->validate($rules);
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'User data has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success', 'Selected user has been deleted !');
    }
}

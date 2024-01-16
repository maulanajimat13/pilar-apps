<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboards.admins.index',[
            'admins' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.admins.create',[
            'admins' => User::all()
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

        return redirect('/dashboard/admins')->with('success', 'New user has been created !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('dashboards.admins.edit',[
            'admin' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $rules = [
            'name' => 'required',
            'password' => 'required|max:255',
            'role' => 'max:255'
        ];

        if($request->email != $admin->email) {
            $rules['email'] = 'required|max:255|unique:admins';
        }

        $validatedData = $request->validate($rules);

        Admin::where('id', $admin->id)
            ->update($validatedData);

        return redirect('/dashboard/admins')->with('success', 'Admin data has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($request)
    {
        User::destroy($request->id);

        return redirect('/dashboard/admins')->with('success', 'Selected admin has been deleted !');
    }
}

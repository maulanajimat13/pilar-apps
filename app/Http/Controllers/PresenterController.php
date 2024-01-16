<?php

namespace App\Http\Controllers;

use App\Models\Presenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PresenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboards.presenters.index',[
            'presenters' => Presenter::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.presenters.create',[

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:presenters',
            'email' => 'required|max:255|unique:presenters',
            'password' => 'required',
            'phone_number' => 'max:255',
            'qris_name' => 'max:255',
            'image' => 'image|file|max:2048'

        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);

        //memasukan gambar ke folder public post-images
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('qris-images');
        }
        //menyimpan ke db
        Presenter::create($validatedData);

        return redirect('/dashboard/presenters')->with('success', 'New brand presenter has been created !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Presenter $presenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presenter $presenter)
    {
        return view('dashboards.presenters.edit',[
            'presenter' => $presenter
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presenter $presenter)
    {
        $rules = [
            'password' => 'required',
            'phone_number' => 'max:255',
            'qris_name' => 'max:255',
            'image' => 'image|file|max:2048'

        ];

        if($request->username != $presenter->username) {
            $rules['username'] = 'required|max:255|unique:presenters';
        }

        if($request->email != $presenter->email) {
            $rules['email'] = 'required|max:255|unique:presenters';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('qris-images');
        }


        $validatedData['password'] = bcrypt($validatedData['password']);

        Presenter::where('id', $presenter->id)
            ->update($validatedData);

        return redirect('/dashboard/presenters')->with('success', 'Brand presenter data has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presenter $presenter)
    {
        if($presenter->image){

            Storage::delete($presenter->image);
        }
        Presenter::destroy($presenter->id);

        return redirect('/dashboard/presenters')->with('success', 'Selected brand presenter has been deleted !');
    }
}

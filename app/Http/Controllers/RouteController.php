<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboards.routes.index',[
            'routes' => Route::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.routes.create',[
            'areas' => Area::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'area_id' => 'required',
            'route_name' => 'required|max:255|unique:routes',
            'route_information' => 'max:255',
        ]);


        //menyimpan ke db
        Route::create($validatedData);

        return redirect('/dashboard/routes')->with('success', 'New routes has been created !');//
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        return view('dashboards.routes.edit',[
            'route' => $route,
            'areas' => Area::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route)
    {
        $rules = [
            'area_id' => 'required',
            'route_information' => 'max:255',
        ];

        if($request->route_name != $route->route_name) {
            $rules['route_name'] = 'required|max:255|unique:routes';
        }

        $validatedData = $request->validate($rules);

        Route::where('id', $route->id)
            ->update($validatedData);

        return redirect('/dashboard/routes')->with('success', 'Route data has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {

        Route::destroy($route->id);

        return redirect('/dashboard/routes')->with('success', 'Selected route has been deleted !');
    }
}

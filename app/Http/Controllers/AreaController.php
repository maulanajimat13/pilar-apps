<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Zone;
use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboards.areas.index',[
            'areas' => Area::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.areas.create',[
            'zones' => Zone::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'zone_id' => 'required',
            'area_name' => 'required|max:255|unique:areas',
            'area_information' => 'max:255',
        ]);


        //menyimpan ke db
        Area::create($validatedData);

        return redirect('/dashboard/areas')->with('success', 'New area has been created !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        return view('dashboards.areas.edit',[
            'area' => $area,
            'zones' => Zone::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {

        $rules = [
            'zone_id' => 'required',
            'area_information' => 'max:255',
        ];

        if($request->area_name != $area->area_name) {
            $rules['area_name'] = 'required|max:255|unique:areas';
        }

        $validatedData = $request->validate($rules);

        Area::where('id', $area->id)
            ->update($validatedData);

        return redirect('/dashboard/areas')->with('success', 'Area data has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        Area::destroy($area->id);

        return redirect('/dashboard/areas')->with('success', 'Selected area has been deleted !');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Http\Requests\StoreZoneRequest;
use App\Http\Requests\UpdateZoneRequest;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboards.zones.index',[
            'zones' => Zone::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.zones.create',[

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'zone_name' => 'required|max:255|unique:zones',
            'zone_information' => 'max:255',
        ]);


        //menyimpan ke db
        Zone::create($validatedData);

        return redirect('/dashboard/zones')->with('success', 'New zone has been created !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Zone $zone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zone $zone)
    {
        return view('dashboards.zones.edit',[
            'zone' => $zone
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zone $zone)
    {

        $rules = [
            'zone_information' => 'max:255',
        ];

        if($request->zone_name != $zone->zone_name) {
            $rules['zone_name'] = 'required|max:255|unique:zones';
        }

        $validatedData = $request->validate($rules);

        Zone::where('id', $zone->id)
            ->update($validatedData);

        return redirect('/dashboard/zones')->with('success', 'Zone data has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zone $zone)
    {
        Zone::destroy($zone->id);

        return redirect('/dashboard/zones')->with('success', 'Selected zone has been deleted !');
    }
}

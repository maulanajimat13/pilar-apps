<?php

namespace App\Http\Controllers;

use App\Models\TeamLeader;
use Illuminate\Http\Request;

class TeamLeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboards.teamLeaders.index',[
            'teamLeaders' => TeamLeader::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.teamLeaders.create',[

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:team_leaders',
            'email' => 'required|max:255|unique:team_leaders',
            'password' => 'required',
            'phone_number' => 'max:255'

        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);

        //menyimpan ke db
        TeamLeader::create($validatedData);

        return redirect('/dashboard/teamleaders')->with('success', 'New team leader has been created !');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamLeader $teamLeader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamLeader $teamLeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamLeader $teamLeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($teamLeader)
    {
        TeamLeader::destroy($teamLeader);

        return redirect('/dashboard/teamleaders')->with('success', 'Selected team leader has been deleted !');
    }
}

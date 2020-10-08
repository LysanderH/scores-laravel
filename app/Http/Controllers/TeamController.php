<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Models\Stat;
use App\Models\Team;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('teams.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        $extension = $request->file_name->extension();
        $request->file_name->storeAs('team-logo/original', mb_strtoupper(mb_substr($request->name, 0, 3)) . "." . $extension);
        $fileName = mb_strtoupper(mb_substr($request->name, 0, 3)) . "_50x50." . $extension;
        $image = Image::make($request->file_name);
        $image->resize(50, 50);
        Storage::disk('local')->makeDirectory('public/team-logo/resized');
        $image->save(public_path('\storage\team-logo\resized/' . mb_strtoupper(mb_substr($request->name, 0, 3)) . "_50x50." . $extension));
        $team = Team::create([
            'name' => $request->name,
            'slug' => mb_strtoupper(mb_substr($request->name, 0, 3)),
            'file_name' => $fileName,
        ]);

        Stat::create([
            'team_id' => $team->id,
        ]);
//            Session::flash('success', "Success!");
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}

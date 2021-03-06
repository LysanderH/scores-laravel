<?php

namespace App\Http\Controllers;

use App\Events\MatchCreated;
use App\Http\Requests\StoreMatchRequest;
use App\Mail\MatchAdded;
use App\Models\Match;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('matches.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('matches.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatchRequest $request)
    {
        $validatedData = $request->validated();
        DB::transaction(function () use ($validatedData) {
            $homeTeam = Team::where('slug', strtoupper($validatedData['home-team']))->first();
            $awayTeam = Team::where('slug', strtoupper($validatedData['away-team']))->first();

            if (Match::where('slug', '=', strtoupper($homeTeam->slug . '-' . $awayTeam->slug))) {
                return redirect()->back()->withErrors(__('Ce match existe déja.'));
            }

            $match = Match::create([
                'played_at' => $validatedData['played_at'],
                'slug' => strtoupper($homeTeam->slug . '-' . $awayTeam->slug)
            ]);

            $match->teams()->attach($homeTeam->id, ['is_home' => 1, 'goals' => $validatedData['home-team-goals']]);
            $match->teams()->attach($awayTeam->id, ['is_home' => 0, 'goals' => $validatedData['away-team-goals']]);

            event(new MatchCreated($match));

        }, 5);
        return redirect()->back()->withSuccess(__('Le match à bien été enregistré'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Match $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Match $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Match $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Match $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Generate;
use App\Models\Account;
use App\Models\Team;
use App\Models\MatchTeam;
use Illuminate\Support\Facades\Auth;


class GenerationController extends Controller
{
    /**
     * Display for a result
     *
     * 
     */
    public function result() {

        $teams_result = Team::all();
        $teams_result = Team::orderBy('pts',  'DESC')->get();
        $results = Generate::all()->where('status_match', '1');
        return view('modal.generate.result')->with('results', $results)->with('teams_result', $teams_result);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan_matches = Generate::all();
        $plan_matches = Generate::OrderBy('created_at', 'Desc')->where('status_match', '0')->get();
        return view('modal.generate.index')->with('plan_matches', $plan_matches)->with('matches');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plan_teams = Team::all();
        return view('modal.generate.create')->with('plan_teams', $plan_teams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'teamA' => 'required',
            'teamB' => 'required',
            'match_date' => 'required',
            'field' => 'required'
        ]);
        

        $plan_team = new Generate();
        $plan_team->teamA_id = $request->teamA;
        $plan_team->teamB_id = $request->teamB;
        $plan_team->field = $request->field;
        $plan_team->match_date = $request->match_date;
        $plan_team->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // match_result is for modal.generate.edit(door modal)
        $match_result = Generate::findOrFail($id);
        // $team_result is om de status van de twee teams te laten zien (aantal keer: gewonnen, verloren, gelijk...)
        $match = Generate::findOrFail($id);
        return view('modal.generate.show')->with('match', $match)->with('match_result', $match_result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match_result = Generate::findOrFail($id);
        return view('modal.generate.edit')->with(['match_result' => $$match_result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $match_result = Generate::findOrFail($id);    
        $match_result->scoreA = $request->scoreA;
        $match_result->scoreB = $request->scoreB;
        $match_result->status_match = $request->status_match;
        $match_result->save();
        return redirect('/');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

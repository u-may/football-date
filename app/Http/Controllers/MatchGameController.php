<?php

namespace App\Http\Controllers;

use App\Models\MatchGame;
use App\Models\League;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchGameController extends Controller
{    
    public function index()
    {
        $matchgames = MatchGame::with(['league', 'homeTeam', 'awayTeam'])->get();
        return view('matchgames.index', compact('matchgames'));
    }

    public function create()
    {
        $leagues = League::all();
        $teams = Team::all();
        return view('matchgames.create', compact('leagues', 'teams'));
    }

    public function store(Request $request)
    {
        MatchGame::create($request->all());
        return redirect()->route('matchgames.index');
    }

    public function edit(MatchGame $matchgame)
    {
        $leagues = League::all();
        $teams = Team::all();
        return view('matchgames.edit', compact('matchgame', 'leagues', 'teams'));
    }

    public function update(Request $request, MatchGame $matchgame)
    {
        $matchgame->update($request->all());
        return redirect()->route('matchgames.index');
    }

    public function destroy(MatchGame $matchgame)
    {
        $matchgame->delete();
        return redirect()->route('matchgames.index');
    }
}
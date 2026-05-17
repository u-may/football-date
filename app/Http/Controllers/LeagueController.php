<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{   
    public function index()
    {
        $leagues = League::all();
        return view('leagues.index', compact('leagues'));
    }

    public function create()
    {
        return view('leagues.create');
    }

    public function store(Request $request)
    {
        League::create($request->all());
        return redirect()->route('leagues.index');
    }

    public function edit(League $league)
    {
        return view('leagues.edit', compact('league'));
    }

    public function update(Request $request, League $league)
    {
        $league->update($request->all());
        return redirect()->route('leagues.index');
    }

    public function destroy(League $league)
    {
        $league->delete();
        return redirect()->route('leagues.index');
    }
}
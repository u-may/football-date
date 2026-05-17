<?php

namespace App\Http\Controllers;

use App\Models\MatchGame;
use App\Models\League;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->date ? Carbon::parse($request->date) : Carbon::today();

        $matchgames = MatchGame::with(['league', 'homeTeam', 'awayTeam'])
            ->whereDate('match_date', $date)
            ->orderBy('match_time')
            ->get();

        $dates = collect(range(-3, 3))->map(fn($i) => Carbon::today()->addDays($i));

        return view('home', compact('matchgames', 'date', 'dates'));
    }

    public function jadwal(Request $request)
    {
        $date = $request->date ? Carbon::parse($request->date) : Carbon::today();

        $leagues = League::all();
        $matchgames = MatchGame::with(['league', 'homeTeam', 'awayTeam'])
            ->whereDate('match_date', $date)
            ->orderBy('match_time')
            ->get();

        $dates = collect(range(-3, 3))->map(fn($i) => Carbon::today()->addDays($i));

        return view('jadwal', compact('matchgames', 'leagues', 'date', 'dates'));
    }

    public function detail($id)
    {
        $matchgame = MatchGame::with(['league', 'homeTeam', 'awayTeam'])->findOrFail($id);
        return view('detail', compact('matchgame'));
    }
}
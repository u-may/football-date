<?php

namespace App\Http\Controllers;

use App\Models\MatchGame;
use App\Models\League;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $matchgames = MatchGame::with(['league', 'homeTeam', 'awayTeam'])
            ->where('status', 'finished')
            ->orderBy('match_date', 'desc')
            ->get();

        return view('laporan', compact('matchgames'));
    }
}
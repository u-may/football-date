<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\League;
use App\Models\Team;
use App\Models\MatchGame;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@footballapp.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        // Liga
        $liga1 = League::create(['name' => 'BRI Liga 1', 'country' => 'Indonesia']);
        $epl = League::create(['name' => 'Premier League', 'country' => 'England']);
        $laliga = League::create(['name' => 'La Liga', 'country' => 'Spain']);

        // Tim Liga 1
        $persija = Team::create(['league_id' => $liga1->id, 'name' => 'Persija Jakarta']);
        $persib = Team::create(['league_id' => $liga1->id, 'name' => 'Persib Bandung']);
        $arema = Team::create(['league_id' => $liga1->id, 'name' => 'Arema FC']);
        $psm = Team::create(['league_id' => $liga1->id, 'name' => 'PSM Makassar']);
        $persebaya = Team::create(['league_id' => $liga1->id, 'name' => 'Persebaya Surabaya']);
        $psis = Team::create(['league_id' => $liga1->id, 'name' => 'PSIS Semarang']);
        $bali = Team::create(['league_id' => $liga1->id, 'name' => 'Bali United FC']);
        $madura = Team::create(['league_id' => $liga1->id, 'name' => 'Madura United']);

        // Tim Premier League
        $arsenal = Team::create(['league_id' => $epl->id, 'name' => 'Arsenal']);
        $chelsea = Team::create(['league_id' => $epl->id, 'name' => 'Chelsea']);
        $liverpool = Team::create(['league_id' => $epl->id, 'name' => 'Liverpool']);
        $mancity = Team::create(['league_id' => $epl->id, 'name' => 'Manchester City']);
        $manutd = Team::create(['league_id' => $epl->id, 'name' => 'Manchester United']);
        $spurs = Team::create(['league_id' => $epl->id, 'name' => 'Tottenham Hotspur']);

        // Tim La Liga
        $realmadrid = Team::create(['league_id' => $laliga->id, 'name' => 'Real Madrid']);
        $barcelona = Team::create(['league_id' => $laliga->id, 'name' => 'Barcelona']);
        $atletico = Team::create(['league_id' => $laliga->id, 'name' => 'Atletico Madrid']);
        $sevilla = Team::create(['league_id' => $laliga->id, 'name' => 'Sevilla']);
        $valencia = Team::create(['league_id' => $laliga->id, 'name' => 'Valencia']);

        // Jadwal Pertandingan
        $matches = [
            // Liga 1
            ['league_id' => $liga1->id, 'home_team_id' => $persija->id, 'away_team_id' => $persib->id, 'match_date' => '2026-05-17', 'match_time' => '19:00', 'venue' => 'Stadion GBK', 'status' => 'finished', 'home_score' => 2, 'away_score' => 1],
            ['league_id' => $liga1->id, 'home_team_id' => $arema->id, 'away_team_id' => $psm->id, 'match_date' => '2026-05-18', 'match_time' => '19:00', 'venue' => 'Stadion Kanjuruhan', 'status' => 'finished', 'home_score' => 0, 'away_score' => 0],
            ['league_id' => $liga1->id, 'home_team_id' => $persebaya->id, 'away_team_id' => $psis->id, 'match_date' => '2026-05-20', 'match_time' => '19:00', 'venue' => 'Stadion GBK', 'status' => 'live', 'home_score' => 1, 'away_score' => 0],
            ['league_id' => $liga1->id, 'home_team_id' => $madura->id, 'away_team_id' => $persija->id, 'match_date' => '2026-05-21', 'match_time' => '19:00', 'venue' => 'Stadion Gelora Bangkalan', 'status' => 'upcoming', 'home_score' => null, 'away_score' => null],
            ['league_id' => $liga1->id, 'home_team_id' => $bali->id, 'away_team_id' => $arema->id, 'match_date' => '2026-05-25', 'match_time' => '19:00', 'venue' => 'Stadion Kapten Dipta', 'status' => 'upcoming', 'home_score' => null, 'away_score' => null],

            // Premier League
            ['league_id' => $epl->id, 'home_team_id' => $arsenal->id, 'away_team_id' => $chelsea->id, 'match_date' => '2026-05-17', 'match_time' => '21:00', 'venue' => 'Emirates Stadium', 'status' => 'finished', 'home_score' => 2, 'away_score' => 0],
            ['league_id' => $epl->id, 'home_team_id' => $liverpool->id, 'away_team_id' => $mancity->id, 'match_date' => '2026-05-18', 'match_time' => '21:00', 'venue' => 'Anfield', 'status' => 'finished', 'home_score' => 1, 'away_score' => 1],
            ['league_id' => $epl->id, 'home_team_id' => $manutd->id, 'away_team_id' => $spurs->id, 'match_date' => '2026-05-20', 'match_time' => '21:00', 'venue' => 'Old Trafford', 'status' => 'live', 'home_score' => 2, 'away_score' => 1],
            ['league_id' => $epl->id, 'home_team_id' => $chelsea->id, 'away_team_id' => $liverpool->id, 'match_date' => '2026-05-22', 'match_time' => '21:00', 'venue' => 'Stamford Bridge', 'status' => 'upcoming', 'home_score' => null, 'away_score' => null],
            ['league_id' => $epl->id, 'home_team_id' => $mancity->id, 'away_team_id' => $arsenal->id, 'match_date' => '2026-05-24', 'match_time' => '21:00', 'venue' => 'Etihad Stadium', 'status' => 'upcoming', 'home_score' => null, 'away_score' => null],

            // La Liga
            ['league_id' => $laliga->id, 'home_team_id' => $realmadrid->id, 'away_team_id' => $barcelona->id, 'match_date' => '2026-05-17', 'match_time' => '22:00', 'venue' => 'Santiago Bernabeu', 'status' => 'finished', 'home_score' => 3, 'away_score' => 2],
            ['league_id' => $laliga->id, 'home_team_id' => $atletico->id, 'away_team_id' => $sevilla->id, 'match_date' => '2026-05-19', 'match_time' => '22:00', 'venue' => 'Wanda Metropolitano', 'status' => 'finished', 'home_score' => 1, 'away_score' => 0],
            ['league_id' => $laliga->id, 'home_team_id' => $barcelona->id, 'away_team_id' => $realmadrid->id, 'match_date' => '2026-05-20', 'match_time' => '22:00', 'venue' => 'Camp Nou', 'status' => 'live', 'home_score' => 0, 'away_score' => 1],
            ['league_id' => $laliga->id, 'home_team_id' => $sevilla->id, 'away_team_id' => $atletico->id, 'match_date' => '2026-05-22', 'match_time' => '22:00', 'venue' => 'Ramon Sanchez Pizjuan', 'status' => 'upcoming', 'home_score' => null, 'away_score' => null],
            ['league_id' => $laliga->id, 'home_team_id' => $valencia->id, 'away_team_id' => $realmadrid->id, 'match_date' => '2026-05-25', 'match_time' => '22:00', 'venue' => 'Estadio Mestalla', 'status' => 'upcoming', 'home_score' => null, 'away_score' => null],
        ];

        foreach ($matches as $match) {
            MatchGame::create($match);
        }
    }
}
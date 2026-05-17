@extends('layouts.public')

@section('content')
    <h2>Jadwal Pertandingan</h2>

    {{-- Filter Tanggal --}}
    <div class="date-nav">
        <a href="{{ route('jadwal', ['date' => $date->copy()->subDay()->format('Y-m-d')]) }}">‹</a>

        <div class="date-display">
            <div class="day-name">{{ $date->translatedFormat('l') }}</div>
            <div class="day-full">{{ $date->translatedFormat('d F Y') }}</div>
            @if($date->isToday())
                <span class="today-badge">Hari Ini</span>
            @endif
        </div>

        <a href="{{ route('jadwal', ['date' => $date->copy()->addDay()->format('Y-m-d')]) }}">›</a>
    </div>

    {{-- Pertandingan --}}
    @if($matchgames->isEmpty())
        <p style="color:#aaa; text-align:center; margin-top:50px;">
            Tidak ada pertandingan pada tanggal ini.
        </p>
    @else
        @foreach($matchgames->groupBy('league_id') as $leagueId => $matches)
            <div class="league-header">{{ $matches->first()->league->name }}</div>

            @foreach($matches as $match)
                <a href="{{ route('detail', $match->id) }}" class="match-card">
                    <div class="team-side">
                        <span class="team-name">{{ $match->homeTeam->name }}</span>
                    </div>

                    <div class="match-center">
                        <div class="score">
                            {{ $match->home_score ?? '-' }} : {{ $match->away_score ?? '-' }}
                        </div>
                        <div class="match-time">{{ $match->match_time }}</div>
                        <span class="badge badge-{{ $match->status }}">
                            {{ strtoupper($match->status) }}
                        </span>
                    </div>

                    <div class="team-side">
    <img src="{{ $match->homeTeam->logo }}" 
         style="width:30px; height:30px; object-fit:contain;"
         onerror="this.style.display='none'">
    <span class="team-name">{{ $match->homeTeam->name }}</span>
</div>

<div class="team-side away">
    <span class="team-name">{{ $match->awayTeam->name }}</span>
    <img src="{{ $match->awayTeam->logo }}" 
         style="width:30px; height:30px; object-fit:contain;"
         onerror="this.style.display='none'">
</div>
                </a>
            @endforeach
        @endforeach
    @endif
@endsection
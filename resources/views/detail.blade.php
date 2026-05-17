@extends('layouts.public')

@section('content')
    <a href="{{ route('jadwal') }}" 
       style="color:#aaa; font-size:13px; text-decoration:none;">← Kembali</a>

    <div style="background:#1a1d27; border-radius:12px; padding:40px; margin-top:20px; text-align:center;">

        <p style="color:#00d4aa; font-size:13px; margin-bottom:20px;">
            {{ $matchgame->league->name }}
        </p>

        <div style="display:flex; justify-content:center; align-items:center; gap:30px;">
            <div>
                <p style="font-size:20px; font-weight:bold;">{{ $matchgame->homeTeam->name }}</p>
                <p style="color:#aaa; font-size:12px;">Kandang</p>
            </div>

            <div>
                <p style="font-size:40px; font-weight:bold; letter-spacing:8px;">
                    {{ $matchgame->home_score ?? '-' }} : {{ $matchgame->away_score ?? '-' }}
                </p>
                <span class="badge badge-{{ $matchgame->status }}">
                    {{ strtoupper($matchgame->status) }}
                </span>
            </div>

            <div>
                <p style="font-size:20px; font-weight:bold;">{{ $matchgame->awayTeam->name }}</p>
                <p style="color:#aaa; font-size:12px;">Tamu</p>
            </div>
        </div>

        <div style="margin-top:30px; color:#aaa; font-size:13px;">
            <p>📅 {{ $matchgame->match_date }} · {{ $matchgame->match_time }}</p>
            @if($matchgame->venue)
    <p> {{ $matchgame->venue }}</p>
@endif
        </div>
    </div>
@endsection
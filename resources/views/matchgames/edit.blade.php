@extends('layouts.admin')

@section('content')
    <h2>📅 Edit Pertandingan</h2>
    <div class="form-card">
        <form action="{{ route('matchgames.update', $matchgame->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Liga</label>
                <select name="league_id" required>
                    @foreach($leagues as $league)
                    <option value="{{ $league->id }}"
                        {{ $matchgame->league_id == $league->id ? 'selected' : '' }}>
                        {{ $league->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tim Kandang</label>
                <select name="home_team_id" required>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}"
                        {{ $matchgame->home_team_id == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tim Tamu</label>
                <select name="away_team_id" required>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}"
                        {{ $matchgame->away_team_id == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="match_date" value="{{ $matchgame->match_date }}" required>
            </div>
            <div class="form-group">
                <label>Jam</label>
                <input type="time" name="match_time" value="{{ $matchgame->match_time }}" required>
            </div>
            <div class="form-group">
                <label>Stadion</label>
                <input type="text" name="venue" value="{{ $matchgame->venue }}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="upcoming" {{ $matchgame->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                    <option value="live" {{ $matchgame->status == 'live' ? 'selected' : '' }}>Live</option>
                    <option value="finished" {{ $matchgame->status == 'finished' ? 'selected' : '' }}>Finished</option>
                </select>
            </div>
            <div class="form-group">
                <label>Skor Kandang</label>
                <input type="number" name="home_score" value="{{ $matchgame->home_score }}">
            </div>
            <div class="form-group">
                <label>Skor Tamu</label>
                <input type="number" name="away_score" value="{{ $matchgame->away_score }}">
            </div>
            <a href="{{ route('matchgames.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
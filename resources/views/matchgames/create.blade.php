@extends('layouts.admin')

@section('content')
    <h2>📅 Tambah Pertandingan</h2>
    <div class="form-card">
        <form action="{{ route('matchgames.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Liga</label>
                <select name="league_id" required>
                    @foreach($leagues as $league)
                    <option value="{{ $league->id }}">{{ $league->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tim Kandang</label>
                <select name="home_team_id" required>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tim Tamu</label>
                <select name="away_team_id" required>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="match_date" required>
            </div>
            <div class="form-group">
                <label>Jam</label>
                <input type="time" name="match_time" required>
            </div>
            <div class="form-group">
                <label>Stadion</label>
                <input type="text" name="venue">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="upcoming">Upcoming</option>
                    <option value="live">Live</option>
                    <option value="finished">Finished</option>
                </select>
            </div>
            <div class="form-group">
                <label>Skor Kandang</label>
                <input type="number" name="home_score">
            </div>
            <div class="form-group">
                <label>Skor Tamu</label>
                <input type="number" name="away_score">
            </div>
            <a href="{{ route('matchgames.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
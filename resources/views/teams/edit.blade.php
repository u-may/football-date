@extends('layouts.admin')

@section('content')
    <h2>👕 Edit Tim</h2>
    <div class="form-card">
        <form action="{{ route('teams.update', $team->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Tim</label>
                <input type="text" name="name" value="{{ $team->name }}" required>
            </div>
            <div class="form-group">
                <label>Liga</label>
                <select name="league_id" required>
                    @foreach($leagues as $league)
                    <option value="{{ $league->id }}"
                        {{ $team->league_id == $league->id ? 'selected' : '' }}>
                        {{ $league->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>URL Logo</label>
                <input type="text" name="logo" value="{{ $team->logo }}">
            </div>
            <a href="{{ route('teams.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
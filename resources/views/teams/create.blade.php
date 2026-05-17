@extends('layouts.admin')

@section('content')
    <h2>👕 Tambah Tim</h2>
    <div class="form-card">
        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Tim</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Liga</label>
                <select name="league_id" required>
                    @foreach($leagues as $league)
                    <option value="{{ $league->id }}">{{ $league->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>URL Logo</label>
                <input type="text" name="logo" placeholder="https://...">
            </div>
            <a href="{{ route('teams.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
@extends('layouts.admin')

@section('content')
    <h2>🏆 Edit Liga</h2>
    <div class="form-card">
        <form action="{{ route('leagues.update', $league->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Liga</label>
                <input type="text" name="name" value="{{ $league->name }}" required>
            </div>
            <div class="form-group">
                <label>Negara</label>
                <input type="text" name="country" value="{{ $league->country }}" required>
            </div>
            <a href="{{ route('leagues.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
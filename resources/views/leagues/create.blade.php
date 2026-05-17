@extends('layouts.admin')

@section('content')
    <h2>🏆 Tambah Liga</h2>
    <div class="form-card">
        <form action="{{ route('leagues.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Liga</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Negara</label>
                <input type="text" name="country" required>
            </div>
            <a href="{{ route('leagues.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
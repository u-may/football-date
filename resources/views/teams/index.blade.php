@extends('layouts.admin')

@section('content')
    <h2>👕 Daftar Tim</h2>
    <a href="{{ route('teams.create') }}" class="btn btn-primary" style="margin-bottom:20px;">+ Tambah Tim</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tim</th>
                <th>Liga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->league->name }}</td>
                <td>
                    <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
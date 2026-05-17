@extends('layouts.admin')

@section('content')
    <h2>🏆 Daftar Liga</h2>
    <a href="{{ route('leagues.create') }}" class="btn btn-primary" style="margin-bottom:20px;">+ Tambah Liga</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Liga</th>
                <th>Negara</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leagues as $league)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $league->name }}</td>
                <td>{{ $league->country }}</td>
                <td>
                    <a href="{{ route('leagues.edit', $league->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('leagues.destroy', $league->id) }}" method="POST" style="display:inline;">
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
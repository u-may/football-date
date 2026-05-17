@extends('layouts.admin')

@section('content')
    <h2>📅 Daftar Pertandingan</h2>
    <a href="{{ route('matchgames.create') }}" class="btn btn-primary" style="margin-bottom:20px;">+ Tambah Pertandingan</a>

    <table>
        <thead>
            <tr>
                <th>Liga</th>
                <th>Tim Kandang</th>
                <th>Skor</th>
                <th>Tim Tamu</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matchgames as $match)
            <tr>
                <td>{{ $match->league->name }}</td>
                <td>{{ $match->homeTeam->name }}</td>
                <td>{{ $match->home_score ?? '-' }} - {{ $match->away_score ?? '-' }}</td>
                <td>{{ $match->awayTeam->name }}</td>
                <td>{{ $match->match_date }}</td>
                <td><span class="badge badge-{{ $match->status }}">{{ strtoupper($match->status) }}</span></td>
                <td>
                    <a href="{{ route('matchgames.edit', $match->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('matchgames.destroy', $match->id) }}" method="POST" style="display:inline;">
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
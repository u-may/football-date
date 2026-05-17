@extends('layouts.admin')

@section('content')
    <h2>📊 Laporan Hasil Pertandingan</h2>
    <button onclick="window.print()" class="btn btn-primary" style="margin-bottom:20px;">🖨️ Print Laporan</button>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Liga</th>
                <th>Tanggal</th>
                <th>Tim Kandang</th>
                <th>Skor</th>
                <th>Tim Tamu</th>
                <th>Stadion</th>
            </tr>
        </thead>
        <tbody>
            @forelse($matchgames as $match)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $match->league->name }}</td>
                <td>{{ $match->match_date }}</td>
                <td>{{ $match->homeTeam->name }}</td>
                <td style="text-align:center; font-weight:bold;">
                    {{ $match->home_score }} - {{ $match->away_score }}
                </td>
                <td>{{ $match->awayTeam->name }}</td>
                <td>{{ $match->venue ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align:center; color:#aaa;">
                    Belum ada pertandingan selesai.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
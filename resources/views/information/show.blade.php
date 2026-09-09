@extends('layouts.app')

@section('content')
<p><a href="{{ route('information.index') }}">&laquo; Kembali</a></p>

<h2>Detail Informasi</h2>

<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <th width="20%">Judul</th>
        <td><b>{{ $information->judul }}</b></td>
    </tr>
    <tr>
        <th>Kategori</th>
        <td>{{ $information->category->nama ?? '-' }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ ucfirst($information->status) }}</td>
    </tr>
    <tr>
        <th>Ringkasan</th>
        <td>{{ $information->ringkasan }}</td>
    </tr>
    <tr>
        <th>Isi Lengkap</th>
        <td>{!! nl2br(e($information->isi)) !!}</td>
    </tr>
    <tr>
        <th>Sumber</th>
        <td>
            @if ($information->sumber)
                <a href="{{ $information->sumber }}" target="_blank">{{ $information->sumber }}</a>
            @else
                -
            @endif
        </td>
    </tr>
</table>
@endsection
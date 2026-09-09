@extends('layouts.app')

@section('content')
<h2>Daftar Informasi</h2>

<!-- Dashboard -->
<table border="1" cellpadding="6" cellspacing="0">
    <tr bgcolor="#eeeeee">
        <th>Total Data</th>
        <th>Published</th>
        <th>Draft</th>
    </tr>
    <tr>
        <td align="center">{{ $totalInformasi }}</td>
        <td align="center">{{ $totalPublished }}</td>
        <td align="center">{{ $totalDraft }}</td>
    </tr>
</table>

<br>

<!-- Search & Tambah -->
<table border="0" width="100%">
    <tr>
        <td>
            <form action="{{ route('information.index') }}" method="GET">
                <input type="text" name="search" placeholder="Cari judul/ringkasan..." value="{{ request('search') }}">
                <button type="submit">Cari</button>
            </form>
        </td>
        <td align="right">
            <a href="{{ route('information.create') }}">[ + Tambah Data Baru ]</a>
        </td>
    </tr>
</table>

<br>

<!-- Tabel Utama CRUD -->
<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <thead>
        <tr bgcolor="#cccccc">
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Ringkasan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($informations as $index => $info)
            <tr>
                <td align="center">{{ $informations->firstItem() + $index }}</td>
                <td><b>{{ $info->judul }}</b></td>
                <td>{{ $info->category->nama ?? '-' }}</td>
                <td>{{ $info->ringkasan }}</td>
                <td align="center">{{ ucfirst($info->status) }}</td>
                <td align="center">
                    <a href="{{ route('information.show', $info->id) }}">Lihat</a> | 
                    <a href="{{ route('information.edit', $info->id) }}">Edit</a> | 
                    <form action="{{ route('information.destroy', $info->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" align="center">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<br>
<div>
    {{ $informations->links() }}
</div>
@endsection
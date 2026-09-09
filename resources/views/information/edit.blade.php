@extends('layouts.app')

@section('content')
<h2>Edit Informasi</h2>
<p><a href="{{ route('information.index') }}">&laquo; Batal</a></p>

@if ($errors->any())
    <div style="color: red;">
        <b>Terjadi Kesalahan:</b>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('information.update', $information->id) }}" method="POST">
    @csrf
    @method('PUT')

    <table border="0" cellpadding="5">
        <tr>
            <td>Kategori:</td>
            <td>
                <select name="kategori_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('kategori_id', $information->kategori_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nama }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>Judul:</td>
            <td><input type="text" name="judul" value="{{ old('judul', $information->judul) }}" size="50" required></td>
        </tr>
        <tr>
            <td>Ringkasan:</td>
            <td><textarea name="ringkasan" rows="3" cols="50" required>{{ old('ringkasan', $information->ringkasan) }}</textarea></td>
        </tr>
        <tr>
            <td>Isi Lengkap:</td>
            <td><textarea name="isi" rows="6" cols="50" required>{{ old('isi', $information->isi) }}</textarea></td>
        </tr>
        <tr>
            <td>Sumber (URL):</td>
            <td><input type="text" name="sumber" value="{{ old('sumber', $information->sumber) }}" size="50"></td>
        </tr>
        <tr>
            <td>Status:</td>
            <td>
                <select name="status" required>
                    <option value="draft" {{ old('status', $information->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $information->status) == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Update</button></td>
        </tr>
    </table>
</form>
@endsection
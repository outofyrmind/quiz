@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h4 class="mb-0 fw-bold">Edit Informasi</h4>
            </div>
            <div class="card-body">
                <!-- Tampilan Error Validasi -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.information.update', $information->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('kategori_id', $information->kategori_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $information->judul) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="ringkasan" class="form-label">Ringkasan</label>
                        <textarea name="ringkasan" id="ringkasan" rows="2" class="form-control" required>{{ old('ringkasan', $information->ringkasan) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Lengkap</label>
                        <textarea name="isi" id="isi" rows="6" class="form-control" required>{{ old('isi', $information->isi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="sumber" class="form-label">Sumber (URL Optional)</label>
                        <input type="url" name="sumber" id="sumber" class="form-control" value="{{ old('sumber', $information->sumber) }}">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="draft" {{ old('status', $information->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $information->status) == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.information.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update Informasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
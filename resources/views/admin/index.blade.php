@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Dashboard Admin</h2>
    <a href="{{ route('admin.information.create') }}" class="btn btn-success">+ Tambah Informasi</a>
</div>

<!-- Dashboard Ringkas (Bonus) -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white shadow-sm border-0">
            <div class="card-body">
                <h6>Total Informasi</h6>
                <h2 class="fw-bold mb-0">{{ $totalInformasi }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white shadow-sm border-0">
            <div class="card-body">
                <h6>Published</h6>
                <h2 class="fw-bold mb-0">{{ $totalPublished }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-secondary text-white shadow-sm border-0">
            <div class="card-body">
                <h6>Draft</h6>
                <h2 class="fw-bold mb-0">{{ $totalDraft }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($informations as $index => $info)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-bold">{{ $info->judul }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $info->category->nama ?? '-' }}</span></td>
                            <td>
                                @if($info->status === 'published')
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-warning text-dark">Draft</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.information.show', $info->id) }}" class="btn btn-sm btn-info text-white">Lihat</a>
                                    <a href="{{ route('admin.information.edit', $info->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <!-- Form DELETE method -->
                                    <form action="{{ route('admin.information.destroy', $info->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin mau menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
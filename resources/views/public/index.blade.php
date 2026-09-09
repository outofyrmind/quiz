@extends('layouts.app')

@section('content')
<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h2 class="fw-bold">Pusat Informasi</h2>
        <p class="text-muted">Melihat daftar informasi yang dipublikasikan.</p>
    </div>
    <div class="col-md-6">
        <!-- Form Search -->
        <form action="{{ route('public.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari judul / ringkasan..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
</div>

<div class="row g-4">
    @forelse ($informations as $info)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-info text-dark mb-2 align-self-start">{{ $info->category->nama ?? 'Umum' }}</span>
                    <h5 class="card-title fw-bold">{{ $info->judul }}</h5>
                    <p class="card-text text-secondary flex-grow-1">{{ $info->ringkasan }}</p>
                    <a href="{{ route('public.show', $info->id) }}" class="btn btn-outline-primary btn-sm mt-3">Detail Informasi &rarr;</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                Tidak ada informasi yang ditemukan.
            </div>
        </div>
    @endforelse
</div>

<div class="mt-4 d-flex justify-content-center">
    {{ $informations->links() }}
</div>
@endsection
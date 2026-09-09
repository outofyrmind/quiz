@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <a href="{{ route('admin.information.index') }}" class="btn btn-link text-decoration-none mb-3">&larr; Kembali ke Dashboard Admin</a>
        <div class="card shadow-sm border-0 p-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-info text-dark">{{ $information->category->nama ?? 'Tanpa Kategori' }}</span>
                    <span class="badge {{ $information->status === 'published' ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ ucfirst($information->status) }}
                    </span>
                </div>
                <h2 class="fw-bold mb-3">{{ $information->judul }}</h2>
                <p class="text-muted border-start border-4 border-primary ps-3 fst-italic mb-4">
                    {{ $information->ringkasan }}
                </p>
                <hr>
                <div class="my-4 lh-lg">
                    {!! nl2br(e($information->isi)) !!}
                </div>
                @if ($information->sumber)
                    <div class="mt-4 pt-3 border-top">
                        <small class="text-muted">Sumber Rujukan: </small>
                        <a href="{{ $information->sumber }}" target="_blank" rel="noopener noreferrer">{{ $information->sumber }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
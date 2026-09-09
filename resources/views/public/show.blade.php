@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <a href="{{ route('public.index') }}" class="btn btn-link text-decoration-none mb-3">&larr; Kembali ke Daftar</a>
        <div class="card shadow-sm border-0 p-4">
            <div class="card-body">
                <span class="badge bg-info text-dark mb-2">{{ $information->category->nama ?? 'Umum' }}</span>
                <h1 class="fw-bold mb-3">{{ $information->judul }}</h1>
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
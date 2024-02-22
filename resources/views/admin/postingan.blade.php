@extends('layouts.main')

@section('main')

@foreach ($postingan as $post)

<div class="col-10 col-md-3 mx-1 my-3 p-1 rounded shadow-lg">
    <div class="d-flex justify-content-between align-items-center">
        <a href=""
            class="ms-3 mt-3 mb-4 d-flex justify-content-start align-items-center mb-2 text-decoration-none">
            <img src="{{ asset($post->user->avatar) }}" alt="..." class="img-fluid rounded-circle" width="50">
            <span class="ms-2 fs-5 text-dark">{{ $post->user->nama }}</span>
        </a>
        <p class="text-muted fs-6 me-3">{{date('d-m-y', strtotime($post->created_at)) }}</p>
    </div>
    <a href="" class="text-decoration-none">
        <img class="img-fluid mx-auto d-block" src="{{ asset('storage/' . $post->lokasi_file) }}" alt="{{ $post->judul_foto }}">
        <div id="post-detail" class="my-2 ms-3">
            <span class="fw-bold fs-5 d-block text-dark">{{ $post->judul_foto }}</span>
            <span class="text-muted fs-6">{{ $post->deskripsi_foto }}</span>
        </div>
    </a>
</div>

@endforeach

@endsection

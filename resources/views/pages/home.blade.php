@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-start">
<<<<<<< HEAD
    @if ($photos === null)
    <h1>kosong</h1>
@endif
=======
>>>>>>> c84463b2eaa18f847fa5b496ba995777d9b09fb9
    @foreach ($photos as $photo)
    <div class="col-10 col-md-3 mx-1 my-3 p-1 rounded shadow-lg">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('user.people', $photo->user->id) }}"
                class="ms-3 mt-3 mb-4 d-flex justify-content-start align-items-center mb-2 text-decoration-none">
                <img src="{{ asset($photo->user->avatar) }}" alt="..." class="img-fluid rounded-circle" width="50">
                <span class="ms-2 fs-5 text-dark">{{ $photo->user->nama }}</span>
            </a>
            <p class="text-muted fs-6 me-3">{{date('d-m-y', strtotime($photo->created_at)) }}</p>
        </div>
        <a href="{{ route('photo.index', $photo->id) }}" class="text-decoration-none">
            <img class="img-fluid mx-auto d-block" src="{{ asset('storage/' . $photo->lokasi_file) }}" alt="{{ $photo->judul_foto }}">
            <div id="post-detail" class="my-2 ms-3">
                <span class="fw-bold fs-5 d-block text-dark">{{ $photo->judul_foto }}</span>
                <span class="text-muted fs-6">{{ $photo->deskripsi_foto }}</span>
            </div>
        </a>
    </div>
    @endforeach
</div>

@endsection

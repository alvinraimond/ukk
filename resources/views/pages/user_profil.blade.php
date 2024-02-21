@extends('layouts.app')

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <link rel="stylesheet" href="assets/css/styles.css">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        {{-- menampilkan foto profil --}}
                        @if ($user->avatar == null)
                            <img src="https://t4.ftcdn.net/jpg/00/97/00/09/240_F_97000908_wwH2goIihwrMoeV9QF3BW6HtpsVFaNVM.jpg"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        @else
                            <img src="{{ asset($user->avatar) }}" alt="avatar"
                                class="rounded-circle" width="200" height="200" style="object-fit: cover">
                        @endif

                        <h5 class="my-3">{{ $user->nama}}</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <div class="d-flex justify-content-center mb-2">
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nama</p>
                        </div>
                        <div class="col-sm-9">

                            <p class="text-muted mb-0">{{ $user->nama }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nis</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->nis }}</p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->email }}</p>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>


    <hr>
    <hr>

    <div class="d-flex justify-content-between mb-5">
        <h2>Postingan {{$user->nama}}</h2>

    </div>
    <div class="row">
        @foreach ($photos as $photo )

     <div class="col-lg-4 mb-4 mb-lg-0">
        <a href="{{ route('photo.index', $photo->id) }}">
   <img src="{{ asset('storage/' . $photo->lokasi_file) }}" class="w-100 shadow-1-strong rounded mb-4"
            alt="Boat on Calm Water"/>
        </a>
        </div>
        @endforeach
      </div>


    </div>
</section>
@endsection

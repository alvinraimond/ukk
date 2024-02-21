@extends('layouts.app')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <link rel="stylesheet" href="assets/css/styles.css">
            {{-- <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
      </div> --}}

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            {{-- menampilkan foto profil --}}
                            @if (Auth::user()->avatar == null)
                                <img src="https://t4.ftcdn.net/jpg/00/97/00/09/240_F_97000908_wwH2goIihwrMoeV9QF3BW6HtpsVFaNVM.jpg"
                                    alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            @else
                                <img src="{{ asset(Auth::user()->avatar) }}" alt="avatar"
                                    class="rounded-circle" width="200" height="200" style="object-fit: cover">
                            @endif

                            <h5 class="my-3">{{ Auth::user()->nama }}</h5>
                            <p class="text-muted mb-1">Full Stack Developer</p>
                            <div class="d-flex justify-content-center mb-2">
                                <!-- edit foto profil -->
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    Edit Foto
                                </button>
                                {{-- hapus foto profil --}}
                                <form action="{{ route('user.hapus') }}" method="POST">

                                    @csrf
                                    <button type="submit" class= "btn btn-danger" style="margin-left: 10px">
                                        Hapus Foto
                                    </button>
                                </form>

                                <!-- ini Modal form edit foto profil -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Avatar</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('user.avatar') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <label for="avatar">Avatar</label>
                                                    <input type="file" class="form-control avatar" id="avatar"
                                                        name="avatar" accept="image/*" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

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

                                <p class="text-muted mb-0">{{ Auth::user()->nama }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nis</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->nis }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit
                            Profil</a>
                        {{-- <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Ini Modal --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- form modal edit data diri --}}
                    <div class="modal-body">
                        <form action="{{ route('user.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ Auth::user()->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">NIS</label>
                                <input disabled type="text" class="form-control" id="exampleInputPassword1"
                                    value="{{ Auth::user()->nis }}">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            {{-- <button type="submit" class="btn btn-primary">Kirim</button> --}}
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Gajadi Edit</button>

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <hr>

        <div class="d-flex justify-content-between mb-5">
            <h2>Postingan</h2>
           <a href="{{route('photo.post')}}"><button class="btn btn-success btn-sm">Buat Postingan</button></a>
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

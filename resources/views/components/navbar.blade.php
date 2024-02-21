<nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3">
    <div class="container">
        <a class="navbar-brand" href="#">N5 Galeri</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto">
                @if (Auth::user())
                <a class="nav-link" aria-current="page" href="{{route('user.home')}}">Home</a>
                <a class="nav-link" href="{{route('user.profil')}} ">Profil</a>
                @endif
            </div>
            @if (Auth::user())
            <a href="{{route('logout.process')}}" class="btn btn-danger">Logout</a>
            <img src="{{asset(Auth::user()->avatar)}}" alt="avatar" class="rounded-circle" width="50" height="50" style="margin-left:10px">
            @else

            <a href="{{ route('login.index') }}" class="btn btn-info text-white">Login</a>
            @endif


        </div>
    </div>
</nav>

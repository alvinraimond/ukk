@extends('layouts.app')

@section('content')

<div class="container-fluid bg-light py-3">
    <div class="row">
        <div class="col-md-6 mx-auto">
                <div class="card card-body">
                    <h3 class="text-center mb-4">Album</h3>
                    <form>
                        <div class="form-group has-error">
                            <input class="form-control input-lg" placeholder="Nama Album" name="nama_album" type="text">
                        </div>
                        <div class="form-group has-success">
                            <input class="form-control input-lg" placeholder="Deskripsi" name="deskripsi" value="" type="password">
                        </div>
                        <div class="form-group has-success">
                            <input class="form-control input-lg" placeholder="Cover Album" name="password" value="" type="file">
                        </div>

                        <input class="btn btn-lg btn-primary btn-block" value="Sign Me Up" type="submit">
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection

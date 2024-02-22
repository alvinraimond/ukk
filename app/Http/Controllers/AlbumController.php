<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index() {
        return view('album.index');
    }

    public function form() {
        return view('album.form');
    }

    public function formProcess(Request $request) {
     

}
}

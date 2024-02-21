<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Photo;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {

        $jumlah = User::count();
        $jumlahPostingan = Photo::count();
        return view('admin.dashboard', compact('jumlah', 'jumlahPostingan'));
    }

    public function postingan() {
        $postingan = Photo::get();
        return view('admin.postingan', compact('postingan'));

}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index ()
        {
            return view('pages.login');
        }


    public function login (Request $request)
        {
            if ( Auth::attempt(['nis' => $request->nis, 'password' => $request->password])) {
                if (Auth::user()->role=== 'user') {

                    Alert::success('Berhasil', 'Anda Berhasil Login');
                    return redirect(route('user.home'));

                } else{
                    return redirect(route('admin.index'));
                }

            }

            else {
                return ('gagal');
            }

        }



}


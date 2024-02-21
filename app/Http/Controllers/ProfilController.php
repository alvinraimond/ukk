<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Photo;

class ProfilController extends Controller
{

    //menampilkan profil sendiri
    public function profil() {
        $user = auth()->user();
        $photos = Photo::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.profil', compact('photos', 'user'));
    }

    //edit foto profil
    public function avatar(Request $request) {

        $request->validate([
            'avatar' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time().'.'.$request->avatar->extension();
        $request->avatar->move(public_path('images'), $imageName);

        $user = User::find(auth()->id());
        $user->avatar = 'images/' . $imageName;
        $user->save();

        Alert::Success('Sukses', 'Foto Berhasil Ditambahkan');

        return back()->with('avatar',$imageName);
    }

    // edit data diri
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->update();
        Alert::Success('Keren', 'Berhasil Update Data');

        return back();
    }


    //hapus foto profil
    public function hapus() {
        $user = Auth::user();
        if ($user->avatar === null) {
            Alert::Error('Foto memang tidak ada');
            return back();
        }
        $user->update(['avatar' => null]);
        Alert::Success('Berhasil', 'Foto Berhasil Dihapus');

        return back();
    }

    //menampilkan profil orang lain
    public function people($user_id){
        if (!User::find($user_id)) {
            return redirect()->route('home');
        }
        $user = User::find($user_id)->select('id', 'nama', 'avatar', 'created_at','nis', 'email')->first();
        $photos = Photo::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        if ($user_id == auth()->user()->id) {
            return redirect(route('user.profil'));
        }
        return view('pages.user_profil', compact('photos', 'user'));
    }
}

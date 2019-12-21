<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function detail($id)
    {
    	$user = \App\User::where('id',$id)->first();
    	if ($user->role=="user") {
	    	return view('profil.detail-user', compact('user'));
    	}else if($user->role=="dokter"){
    		$dokter = \App\Dokter::where('user_id',$id)->first();
	    	return view('profil.detail-dokter', compact('dokter'));
    	}
    }
    public function listUser()
    {
        $user = \App\User::where('role','user')->paginate(10);
        return view('user.index', compact('user'));
    }
    public function display()
    {
        if (Auth::user()->role=="user") {
            $user = Auth::user();
            return view('setting.user', compact('user'));
        }else if(Auth::user()->role=="dokter"){
            $user = Auth::user();
            return view('setting.dokter', compact('user'));
        }
    }

    public function updateUmum(Request $req)
    {
        $ThisId = Auth::user()->id;
        $cek = \App\User::where('email',$req->email)->first();
        if(($req->emailLawas==$req->email) || empty($cek)){
          if (Auth::user()->role=="user") {
            \App\User::where('id',$ThisId)
              ->update([
                  'name' => $req->name,
                  'email' => $req->email,
              ]);
            return redirect()->back()->with('sukses','berhasil mengubah informasi umum');
          }else if (Auth::user()->role=="dokter") {
            \App\User::where('id',$ThisId)
              ->update([
                  'name' => $req->name,
                  'email' => $req->email,
              ]);
            \App\Dokter::where('user_id','$ThisId')
              ->update([
                'nama' => $req->name,
              ]);
            return redirect()->back()->with('sukses','berhasil mengubah informasi umum');
          }
      }
      else if (!empty($cek)) {
        return redirect()->back()->with('gagal','Email telah digunakan');
      }
    }
    public function updatePass(Request $req)
    {
        $thisID = Auth::user()->id;
        if ($req->password !== $req->password_confirmation) {
          return redirect()->back()->with('gagal','Password anda tidak sesuai');
        }else{
          \App\User::where('id',$thisID)
              ->update([
                  'password' => bcrypt($req->password),
              ]);
            return redirect()->back()->with('sukses','Password anda telah dirubah');
        }
    }
}

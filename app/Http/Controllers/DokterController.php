<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $sp = \App\Spesialis::All();
    	return view('auth.register-dokter',compact('sp'));
    }
    public function createDokter(Request $req)
    {
        $timeNow = Carbon::now();
    	$cek = \App\User::where('email','=',$req->email)->first();
    	if(!empty($cek)){
            return redirect()->back()->with('gagal','Email telah digunakan');
    	}else{
    		if ($req->password == $req->password2) {
                if ($req->tgl_lahir >= $timeNow) {
                    return redirect()->back()->with('gagal','Tanggal lahir tidak bisa lebih dari saat ini');
                }else{

                $u = new \App\User;
                $u->id = mt_rand(1000,9999);
                \App\Dokter::create([
                    'id' => mt_rand(1000,9999),
                    'user_id' => $u->id,
                    'spesialis_id' => $req->spesialis,
                    'nama' => $req->name,
                    'nip' => $req->nip,
                    'nohp' => $req->nohp,
                    'noktp' => $req->noktp,
                    'tgl_lahir' => $req->tgl_lahir,
                    'jenis_kelamin' => $req->jk,
                    'tempat_dinas' => $req->tempat_dinas,
                    'pendidikan' => $req->pendidikan,
                ]);
                $u->role = 'dokter';
                $u->name = $req->name;
                $u->email = $req->email;
                $u->password = bcrypt($req->password2);
                $u->save();
    		return redirect('/login')->with('sukses','Berhasil melakukan registrasi');
                }
    		}else{
        		return redirect()->back()->with('gagal','Password tidak sesuai');
    		}
    	}
    }
    public function list()
    {
        $dokter = \App\Dokter::All();
        return view('dokter.index',compact('dokter'));
    }
}

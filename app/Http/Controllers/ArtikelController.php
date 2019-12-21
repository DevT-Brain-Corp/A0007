<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
    	$data = \App\Artikel::All();
    	return view('artikel.index', compact('data'));
    }
    public function detail($slug)
    {
    	$data = \App\Artikel::where('slug','=',$slug)->first();
    	return view('artikel.detail',compact('data'));
    }
    public function linkOncreate()
    {
        $userid = Auth::user();
        $Isdokter = \App\Dokter::where('user_id','=',$userid)->first();
        return view('artikel.create',compact('userid'));
    }
    public function store(Request $req)
    {
        $a1 = ($req->file('foto'))->getClientOriginalName();
        if ((strpos($a1, "jpg") || strpos($a1, "jpeg") || strpos($a1, "png") || strpos($a1, "JPG"))===false) {
            return redirect()->back()->with('gagal','Foto harus berupa PNG, JPEG, JPG');
        }else{
            $userid = Auth::user()->id;
            if (Auth::user()->role=="user") {

                $tempatfile = ('foto-artikel');

                $filenya = $req->file('foto');
                $nama_file = $filenya->getClientOriginalName();
                $filenya->move($tempatfile, $nama_file);

                $z = new \App\Artikel;
                $z->id = mt_rand(1000,9999);
                $z->user_id = $userid;
                $z->judul = $req->judul;
                $z->kategori = $req->kategori;
                $z->slug = Str::slug($req->judul, '-');
                $z->gambar = $nama_file;
                $z->deskripsi = $req->deskripsi;
                $z->save();

                return redirect()->back()->with('sukses','berhasil membuat artikel');
            }else if(Auth::user()->role=="dokter"){

                $tempatfile = ('foto-artikel');

                $filenya = $req->file('foto');
                $nama_file = $filenya->getClientOriginalName();
                $filenya->move($tempatfile, $nama_file);

                $z = new \App\Artikel;
                $z->id = mt_rand(1000,9999);
                $z->user_id = $userid;
                $z->judul = $req->judul;
                $z->kategori = $req->bidang;
                $z->slug = Str::slug($req->judul, '-');
                $z->gambar = $nama_file;
                $z->deskripsi = $req->deskripsi;
                $z->save();

                return redirect()->back()->with('sukses','berhasil membuat artikel');
            }
        }
    }
    public function edit($id)
    {
        $data = \App\Artikel::where('id','=',$id)->first();
        return view('artikel.edit', compact('data'));
    }
    public function update(Request $req)
    {
        if (empty($req->file('foto-update'))) {
            \App\Artikel::where('id','=',$req->artikel_id)
                ->update([
                    'judul' => $req->judul,
                    'kategori' => $req->kategori,
                    'slug' => Str::slug($req->judul, '-'),
                    'deskripsi' => $req->deskripsi,
                ]);
            return redirect()->back()->with('sukses','berhasil mengubah data');

        }else{

            $a1 = ($req->file('foto-update'))->getClientOriginalName();

            if ((strpos($a1, "jpg") || strpos($a1, "jpeg") || strpos($a1, "png") || strpos($a1, "JPG"))===false) {

                return redirect()->back()->with('gagal','Foto harus berupa PNG, JPEG, JPG');
            }
            else{

                // $userid = Auth::user()->id;
                $tempatfile = ('foto-artikel');

                $filenya = $req->file('foto-update');
                $nama_update = $filenya->getClientOriginalName();

                // dd($nama_update);
                $filenya->move($tempatfile, $nama_update);

                \App\Artikel::where('id','=',$req->artikel_id)
                ->update([
                    'judul' => $req->judul,
                    'kategori' => $req->kategori,
                    'slug' => Str::slug($req->judul, '-'),
                    'gambar' => $nama_update,
                    'deskripsi' => $req->deskripsi,
                ]);

                return redirect()->back()->with('sukses','berhasil membuat artikel');
            }


        }
    }
    public function delete(Request $req)
    {
        \App\Artikel::where('id','=',$req->id_artikel_D)->delete();
        \App\Komen::where('artikel_id','=',$req->id_artikel_D)->delete();

        return redirect()->back()->with('sukses','berhasil menghapus artikel');
    }
}

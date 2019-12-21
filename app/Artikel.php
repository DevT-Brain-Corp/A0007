<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $fillable = ['id','user_id','kategori','judul','slug','gambar','deskripsi'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function komen()
    {
    	return $this->hasMany('App\Komen');
    }
}

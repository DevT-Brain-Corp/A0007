<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    protected $table = 'spesialis';
    protected $fillable = ['id','nama_spesialis','bidang'];

    public function dokter()
    {
    	return $this->hasMany('App\Dokter');
    }
}

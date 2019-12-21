<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $fillable = ['id','user_id','spesialis_id','nama','nip','noktp','nohp','tgl_lahir','jenis_kelamin','tempat_dinas','pendidikan'];

    public function spesialis()
    {
    	return $this->belongsTo('App\Spesialis');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

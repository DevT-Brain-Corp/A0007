<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    protected $table = 'komen';
    protected $fillable = ['id','user_id','artikel_id','commenttext'];

    public function artikel()
    {
    	return $this->belongsTo('App\Artikel');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

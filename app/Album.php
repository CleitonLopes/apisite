<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = "albuns";

    protected $fillable = ['titulo'];

    public function galeria()
    {

    	return $this->hasMany('App\Galeria', 'album_id');

    }

}

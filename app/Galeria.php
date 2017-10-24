<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{

    protected $table = 'galeria';
    protected $fillable = ['nome', 'album_id', 'nome_original', 'extensao', 'tamanho', 'mime_type'];

    public function album()
    {
    	return $this->belongsTo('App\Album', 'id');
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Album;
use App\Http\Controllers\Traits\ApiControllerTrait;
use App\Services\ServiceAlbum;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

	use ApiControllerTrait;

	protected $model;
	protected $relationships = ['galeria'];
	protected $serviceAlbum;

	public function __construct(Album $album, ServiceAlbum $serviceAlbum)
	{

		$this->model = $album;
		$this->serviceAlbum = $serviceAlbum;

	}

    public function destroy($idalbum)
	{

		return $this->serviceAlbum->destroy($idalbum);

	}

}

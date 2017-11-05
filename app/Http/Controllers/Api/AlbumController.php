<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Album;
use App\Http\Controllers\Traits\ApiControllerTrait;

class AlbumController extends Controller
{

	use ApiControllerTrait;

	protected $model;
	protected $relationships = ['galeria'];

	public function __construct(Album $album)
	{

		$this->model = $album;

	}

}

<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Galeria;

class ServiceGaleria
{

	private $model;
	private $serviceFile;

	public function __construct(Galeria $galeria)
	{

		$this->model = $galeria;

	}

	public function create(array $data)
	{

    	return $data = $this->model->create($data);

	}

}
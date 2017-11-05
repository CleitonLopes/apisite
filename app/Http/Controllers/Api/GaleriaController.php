<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiControllerTrait;
use App\Galeria;
use App\Services\ServiceUploadFile;
use App\Services\ServiceGaleria;
use App\Services\ServiceFile;

class GaleriaController extends Controller
{

    use ApiControllerTrait;

    protected $model;
    protected $serviceUploadFile;
    protected $serviceGaleria;
    protected $relationships = ['album'];

    public function __construct(Galeria $galeria, ServiceUploadFile $serviceUploadFile, ServiceGaleria $serviceGaleria, ServiceFile $serviceFile)
    {

    	$this->model = $galeria;
    	$this->serviceUploadFile = $serviceUploadFile;
    	$this->serviceGaleria = $serviceGaleria;
		$this->serviceFile = $serviceFile;

    }

    public function store(Request $request)
    {

    	$file = $this->serviceUploadFile->getFile($request);

    	$data = $this->serviceUploadFile->getData($request);

    	return $this->serviceGaleria->create($data, $file);


    }

    public function destroy($idalbum, $idimagem)
    {

        return $this->serviceGaleria->destroy($idalbum, $idimagem);

    }

}

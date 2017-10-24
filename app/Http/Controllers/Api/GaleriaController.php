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
    	//Storage::put('1', $request->file('file'));

    	$file = $this->serviceUploadFile->getFile($request);
    	$data = $this->serviceUploadFile->getData($request);

    	$result = $this->serviceGaleria->create($data);

    	if ($result)
    	{

    		$data['id'] = $result['id'];
	    	$this->serviceFile->saveFile($data, $file);

    	}

    }

    public function destroy($id)
    {


    }

}

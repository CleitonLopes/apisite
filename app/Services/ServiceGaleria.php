<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Galeria;
use App\Services\ServiceFile;
use App\Services\ServiceResponse;

class ServiceGaleria
{

	private $model;
	private $serviceFile;

	public function __construct(Galeria $galeria, ServiceFile $serviceFile, ServiceResponse $serviceResponse)
	{

		$this->model = $galeria;
		$this->serviceFile = $serviceFile;
		$this->serviceResponse = $serviceResponse;

	}

	public function create(array $data, $file)
	{

		try {

			$path = $this->serviceFile->saveFile($data, $file);

			$data['path'] = $path;

	    	if ($this->model->create($data))
	    	{

	    		return $this->serviceResponse->getResponse(['Imagem salva com sucesso !', 200]);

	    	}

		} catch (Exception $e) {

			return $this->serviceResponse->getResponse([$e->getMessage(), 400]);

		}



	}

	public function destroy($idalbum, $idimagem)
	{

		try {

			if ($galeria = $this->model->find($idimagem))
			{

				if ($galeria->delete())
				{

					if ($this->serviceFile->destroy($galeria['path']))
					{
						return $this->serviceResponse->getResponse(['Imagem excluida com sucesso !', 200]);
					}

					return $this->serviceResponse->getResponse(['Imagem deletada do banco, mas houve algum erro ao deletar do storage, contate o suporte !', 400]);

				}


			}

			return $this->serviceResponse->getResponse(['Imagem não encontrada !', 400]);

		} catch (Exception $e) {

			return $this->serviceResponse->getResponse([$e->getMessage(), 400]);

		}

	}

}
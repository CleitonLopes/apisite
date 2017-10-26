<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Galeria;
use App\Services\ServiceFile;

class ServiceGaleria
{

	private $model;
	private $serviceFile;

	public function __construct(Galeria $galeria, ServiceFile $serviceFile)
	{

		$this->model = $galeria;
		$this->serviceFile = $serviceFile;

	}

	public function create(array $data, $file)
	{

		try {

			$path = $this->serviceFile->saveFile($data, $file);

			$data['path'] = $path;

	    	if ($this->model->create($data))
	    	{

	            return response()->json([

					'resultado' => 'Imagem salva com sucesso !',
					'status' => 200

				]);

	    	}

		} catch (Exception $e) {

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
						return response()->json([

							'resultado' => 'Imagem deletada com sucesso !',
							'status' => 200

						]);
					}

					return response()->json([

						'resultado' => 'Imagem deletada do banco mas houve algum erro ao deletar do storage, contate o suporte !',
						'status' => 400

					]);

				}


			}

			return response()->json([

				'resultado' => 'Imagem não encontrada, verifque !',
				'status' => 400

			]);

		} catch (Exception $e) {

			return $e->getMessage();

		}

	}

}
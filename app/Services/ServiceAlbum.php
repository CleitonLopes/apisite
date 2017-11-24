<?php

namespace App\Services;

use App\Album;
use App\Services\ServiceFile;
use App\Services\ServiceResponse;

class ServiceAlbum
{

	protected $album;
	protected $serviceFile;
	protected $serviceResponse;

	public function __construct(Album $album, ServiceFile $serviceFile, ServiceResponse $serviceResponse)
	{

		$this->album = $album;
		$this->serviceFile = $serviceFile;
		$this->serviceResponse = $serviceResponse;

	}

	public function destroy($idalbum)
	{

		try
		{

			if ($album = $this->album->find($idalbum))
			{

				if ($album->delete())
				{

					if ($this->serviceFile->destroy($idalbum, true)) {

							return $this->serviceResponse->getResponse(['Album excluido com sucesso', 200]);

					}

					return $this->serviceResponse->getResponse(['Album deletado do banco, mas houve algum erro ao deletar do storage, contate o suporte !', 400]);

				}


			}

		}
		catch (Exception $e)
		{

			return $this->serviceResponse->getResponse([$e->getMessage(), 400]);

		}

	}

}


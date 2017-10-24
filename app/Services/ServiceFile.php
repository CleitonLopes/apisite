<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ServiceFile
{

	private $storage;

	public function __construct(Storage $storage)
	{

		$this->storage = $storage;

	}

	public function saveFile($data, $file)
	{

		$path = "{$data['album_id']}/{$data['id']}";

		$name = $file['file']->storeAs($file['file'], 'teste');

		$this->storage::put($path, $name);

		//$this->storage::put($path, $file['file']);

	}

}
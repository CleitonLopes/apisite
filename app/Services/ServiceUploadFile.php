<?php

namespace App\Services;

use Illuminate\Http\Request;

class ServiceUploadFile
{

	protected $file;

	public function __construct()
	{

	}

	public function getFile(Request $request) : array
	{

		$data['file'] = $request->file('file');

		return $data;

	}

	public function getData(Request $request): array
	{

		$file = $request->file('file');

		$data['nome']			= $file->getPathName();//$request->all()['nome'] ?? "";
    	$data['album_id'] 		= $request->all()['album_id'];
		$data['nome_original']  = $file->getClientOriginalName();
		$data['extensao']		= $file->getClientOriginalExtension();
		$data['tamanho']		= $file->getSize();
		$data['mime_type'] 		= $file->getMimeType();

		return $data;

	}

}
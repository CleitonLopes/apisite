<?php

namespace App\Services;

class ServiceResponse
{

	public function getResponse(array $params)
	{
		return response()->json([

			'resultado' => $params[0],
			'status' => $params[1]

		]);
	}

}
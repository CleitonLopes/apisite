<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiControllerTrait;
use App\Site;

class SiteController extends Controller
{

	use ApiControllerTrait;

	protected $model;

	public function __construct(Site $site)
	{

		$this->model = $site;

	}

}

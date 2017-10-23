<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Album;

class InicioController extends Controller
{

	private $album;

	public function __construct(Album $album)
	{

		$this->album = $album;

	}

    public function index(Request $request)
    {

    	$limit = $request->all()['limit'] ?? 15;

    	$order = $request->all()['order'] ?? null;

    	$where = $request->all()['where'] ?? [];

    	$like = $request->all()['like'] ?? null;

    	if ($like)
    	{

    		$like = explode(',', $like);
    		$like[1] = '%'. $like[1] .'%';

    	}

    	//dd($request->all());

    	if ($order !== null)
    	{

    		$order = explode(',', $order);

    	}

		$order[0] = $order[0] ?? 'id';
		$order[1] = $order[1] ?? 'asc';

    	return response()->json($this->album::orderBy($order[0], $order[1])

    		->where(function($query) use ($like) {

    			if ($like)
    			{
    				return $query->where($like[0], 'like', $like[1]);
    			}

    			return $query;

    		})

    		->where($where)

    		->paginate($limit));

    }

    public function show($id)
    {

    	return response()->json($this->album->findOrFail($id));
    }

    public function store(Request $request)
    {

    	$album = $this->album->create($request->all());

    	return response()->json($album);

    }
}

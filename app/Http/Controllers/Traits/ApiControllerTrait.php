<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait ApiControllerTrait
{

    public function index(Request $request)
    {

        $limit = $request->all()['limit'] ?? 20;

        $order = $request->all()['order'] ?? null;

        $where = $request->all()['where'] ?? [];

        $like = $request->all()['like'] ?? null;

        if ($like)
        {

            $like = explode(',', $like);
            $like[1] = '%'. $like[1] .'%';

        }

        if ($order !== null)
        {

            $order = explode(',', $order);

        }

        $order[0] = $order[0] ?? 'id';
        $order[1] = $order[1] ?? 'asc';

        return response()->json($this->model::orderBy($order[0], $order[1])

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
        return response()->json($this->model->with($this->relationships())->findOrFail($id));

    }

    public function store(Request $request)
    {

        $album = $this->model->create($request->all());

        return response()->json($album);

    }

    public function update(Request $request, $id)
    {

        $album = $this->model->findOrFail($id);

        $album->update($request->all());

        return response()->json($album);

    }

    public function destroy($id)
    {

        $album = $this->model->findOrFail($id);
        return response()->json($album->delete());

    }

    public function relationships()
    {

        if (isset($this->relationships))
        {

            return $this->relationships;

        }

        return [];
    }

}


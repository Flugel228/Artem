<?php

namespace App\Http\Controllers\API;

use App\Contracts\Actions\ShowUserActionContract;
use App\Contracts\Actions\StoreUserActionContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\ShowRequest;
use App\Http\Requests\API\User\StoreRequest;

class UserController extends Controller
{
    public function store(StoreRequest $request, StoreUserActionContract $action): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $action = $action($data);
        return response()
            ->json($action['response'], $action['status']);
    }

    public function show(ShowRequest $request, ShowUserActionContract $action): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $action = $action($data);
        return response()
            ->json($action['response'], $action['status']);
    }
}

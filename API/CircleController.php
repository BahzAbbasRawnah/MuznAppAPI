<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Circle;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CircleController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $circles = Circle::all();
        return $this->successResponse($circles);
    }

    public function show($id)
    {
        $circle = Circle::find($id);
        if (!$circle) {
            return $this->errorResponse('Circle not found', 404);
        }
        return $this->successResponse($circle);
    }

    public function store(Request $request)
    {
        $circle = Circle::create($request->all());
        return $this->successResponse($circle, 'Circle created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $circle = Circle::find($id);
        if (!$circle) {
            return $this->errorResponse('Circle not found', 404);
        }
        $circle->update($request->all());
        return $this->successResponse($circle, 'Circle updated successfully');
    }

    public function destroy($id)
    {
        $circle = Circle::find($id);
        if (!$circle) {
            return $this->errorResponse('Circle not found', 404);
        }
        $circle->delete();
        return $this->successResponse(null, 'Circle deleted successfully');
    }
}

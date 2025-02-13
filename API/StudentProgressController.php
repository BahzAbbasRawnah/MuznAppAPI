<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\StudentProgress;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class StudentProgressController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $progresses = StudentProgress::all();
        return $this->successResponse($progresses);
    }

    public function show($id)
    {
        $progress = StudentProgress::find($id);
        if (!$progress) {
            return $this->errorResponse('Progress not found', 404);
        }
        return $this->successResponse($progress);
    }

    public function store(Request $request)
    {
        $progress = StudentProgress::create($request->all());
        return $this->successResponse($progress, 'Progress created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $progress = StudentProgress::find($id);
        if (!$progress) {
            return $this->errorResponse('Progress not found', 404);
        }
        $progress->update($request->all());
        return $this->successResponse($progress, 'Progress updated successfully');
    }

    public function destroy($id)
    {
        $progress = StudentProgress::find($id);
        if (!$progress) {
            return $this->errorResponse('Progress not found', 404);
        }
        $progress->delete();
        return $this->successResponse(null, 'Progress deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CircleStudent;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CircleStudentController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $circleStudents = CircleStudent::all();
        return $this->successResponse($circleStudents);
    }

    public function show($id)
    {
        $circleStudent = CircleStudent::find($id);
        if (!$circleStudent) {
            return $this->errorResponse('CircleStudent not found', 404);
        }
        return $this->successResponse($circleStudent);
    }

    public function store(Request $request)
    {
        $circleStudent = CircleStudent::create($request->all());
        return $this->successResponse($circleStudent, 'CircleStudent created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $circleStudent = CircleStudent::find($id);
        if (!$circleStudent) {
            return $this->errorResponse('CircleStudent not found', 404);
        }
        $circleStudent->update($request->all());
        return $this->successResponse($circleStudent, 'CircleStudent updated successfully');
    }

    public function destroy($id)
    {
        $circleStudent = CircleStudent::find($id);
        if (!$circleStudent) {
            return $this->errorResponse('CircleStudent not found', 404);
        }
        $circleStudent->delete();
        return $this->successResponse(null, 'CircleStudent deleted successfully');
    }
}

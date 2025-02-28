<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $students = Student::all();
        return $this->successResponse($students);
    }

    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return $this->errorResponse('Student not found', 404);
        }
        return $this->successResponse($student);
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return $this->successResponse($student, 'Student created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return $this->errorResponse('Student not found', 404);
        }
        $student->update($request->all());
        return $this->successResponse($student, 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return $this->errorResponse('Student not found', 404);
        }
        $student->delete();
        return $this->successResponse(null, 'Student deleted successfully');
    }
}

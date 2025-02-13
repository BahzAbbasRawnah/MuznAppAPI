<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $schools = School::all();
        return $this->successResponse($schools);
    }

    public function show($id)
    {
        $school = School::find($id);
        if (!$school) {
            return $this->errorResponse('School not found', 404);
        }
        return $this->successResponse($school);
    }

    public function store(Request $request)
    {
        $school = School::create($request->all());
        return $this->successResponse($school, 'School created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $school = School::find($id);
        if (!$school) {
            return $this->errorResponse('School not found', 404);
        }
        $school->update($request->all());
        return $this->successResponse($school, 'School updated successfully');
    }

    public function destroy($id)
    {
        $school = School::find($id);
        if (!$school) {
            return $this->errorResponse('School not found', 404);
        }
        $school->delete();
        return $this->successResponse(null, 'School deleted successfully');
    }
}

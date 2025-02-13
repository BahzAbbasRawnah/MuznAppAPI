<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\StudentAttendance;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class StudentAttendanceController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $attendances = StudentAttendance::all();
        return $this->successResponse($attendances);
    }

    public function show($id)
    {
        $attendance = StudentAttendance::find($id);
        if (!$attendance) {
            return $this->errorResponse('Attendance not found', 404);
        }
        return $this->successResponse($attendance);
    }

    public function store(Request $request)
    {
        $attendance = StudentAttendance::create($request->all());
        return $this->successResponse($attendance, 'Attendance created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $attendance = StudentAttendance::find($id);
        if (!$attendance) {
            return $this->errorResponse('Attendance not found', 404);
        }
        $attendance->update($request->all());
        return $this->successResponse($attendance, 'Attendance updated successfully');
    }

    public function destroy($id)
    {
        $attendance = StudentAttendance::find($id);
        if (!$attendance) {
            return $this->errorResponse('Attendance not found', 404);
        }
        $attendance->delete();
        return $this->successResponse(null, 'Attendance deleted successfully');
    }
}

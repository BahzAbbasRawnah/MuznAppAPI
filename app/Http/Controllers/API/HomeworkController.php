<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $homeworks = Homework::all();
        return $this->successResponse($homeworks);
    }

    public function show($id)
    {
        $homework = Homework::find($id);
        if (!$homework) {
            return $this->errorResponse('Homework not found', 404);
        }
        return $this->successResponse($homework);
    }

    public function store(Request $request)
    {
        $homework = Homework::create($request->all());
        return $this->successResponse($homework, 'Homework created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $homework = Homework::find($id);
        if (!$homework) {
            return $this->errorResponse('Homework not found', 404);
        }
        $homework->update($request->all());
        return $this->successResponse($homework, 'Homework updated successfully');
    }

    public function destroy($id)
    {
        $homework = Homework::find($id);
        if (!$homework) {
            return $this->errorResponse('Homework not found', 404);
        }
        $homework->delete();
        return $this->successResponse(null, 'Homework deleted successfully');
    }
}

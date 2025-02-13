<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DigitalLibrary;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
class DigitalLibraryController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $libraries = DigitalLibrary::all();
        return $this->successResponse($libraries);
    }

    public function show($id)
    {
        $library = DigitalLibrary::find($id);
        if (!$library) {
            return $this->errorResponse('Library not found', 404);
        }
        return $this->successResponse($library);
    }

    public function store(Request $request)
    {
        $library = DigitalLibrary::create($request->all());
        return $this->successResponse($library, 'Library created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $library = DigitalLibrary::find($id);
        if (!$library) {
            return $this->errorResponse('Library not found', 404);
        }
        $library->update($request->all());
        return $this->successResponse($library, 'Library updated successfully');
    }

    public function destroy($id)
    {
        $library = DigitalLibrary::find($id);
        if (!$library) {
            return $this->errorResponse('Library not found', 404);
        }
        $library->delete();
        return $this->successResponse(null, 'Library deleted successfully');
    }
}

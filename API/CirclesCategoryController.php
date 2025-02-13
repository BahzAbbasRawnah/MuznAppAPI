<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CirclesCategory;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CirclesCategoryController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $categories = CirclesCategory::all();
        return $this->successResponse($categories);
    }

    public function show($id)
    {
        $category = CirclesCategory::find($id);
        if (!$category) {
            return $this->errorResponse('Category not found', 404);
        }
        return $this->successResponse($category);
    }

    public function store(Request $request)
    {
        $category = CirclesCategory::create($request->all());
        return $this->successResponse($category, 'Category created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $category = CirclesCategory::find($id);
        if (!$category) {
            return $this->errorResponse('Category not found', 404);
        }
        $category->update($request->all());
        return $this->successResponse($category, 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = CirclesCategory::find($id);
        if (!$category) {
            return $this->errorResponse('Category not found', 404);
        }
        $category->delete();
        return $this->successResponse(null, 'Category deleted successfully');
    }
}

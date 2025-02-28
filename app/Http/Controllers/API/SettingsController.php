<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $settings = Settings::all();
        return $this->successResponse($settings);
    }

    public function show($id)
    {
        $setting = Settings::find($id);
        if (!$setting) {
            return $this->errorResponse('Setting not found', 404);
        }
        return $this->successResponse($setting);
    }

    public function store(Request $request)
    {
        $setting = Settings::create($request->all());
        return $this->successResponse($setting, 'Setting created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $setting = Settings::find($id);
        if (!$setting) {
            return $this->errorResponse('Setting not found', 404);
        }
        $setting->update($request->all());
        return $this->successResponse($setting, 'Setting updated successfully');
    }

    public function destroy($id)
    {
        $setting = Settings::find($id);
        if (!$setting) {
            return $this->errorResponse('Setting not found', 404);
        }
        $setting->delete();
        return $this->successResponse(null, 'Setting deleted successfully');
    }
}

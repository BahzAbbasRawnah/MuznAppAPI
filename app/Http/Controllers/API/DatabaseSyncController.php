<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSyncController extends Controller
{
    public function sync(Request $request)
    {
        Log::info('on sync request', [$request]);
        $tables = [
            'User' => \App\Models\User::class,
            'School' => \App\Models\School::class,
//            'CirclesCategory' => \App\Models\CirclesCategory::class,
            'Circle' => \App\Models\Circle::class,
            'Student' => \App\Models\Student::class,
            'CircleStudent' => \App\Models\CircleStudent::class,
            'StudentAttendance' => \App\Models\StudentAttendance::class,
            'Homework' => \App\Models\Homework::class,
            'StudentProgress' => \App\Models\StudentProgress::class,
            'digital_libraries' => \App\Models\DigitalLibrary::class,
            'settings' => \App\Models\Settings::class,
        ];

//        DB::beginTransaction();
//        try {
        foreach ($tables as $table => $model) {
            if ($request->has($table)) {
                foreach ($request->input($table) as $data) {
                    if (!isset($data['uuid'])) {
                        continue; // Skip if no UUID
                    }

                    $uuid = $data['uuid'];
                    unset($data['is_sync']);
                    $model::updateOrCreate(
                        ['uuid' => $uuid], // Search by UUID
                        $data // Update or insert data
                    );
                }
            }
        }

//            DB::commit();
        return response()->json(['message' => 'Data synced successfully'], 200);
//        } catch (\Exception $e) {
//            DB::rollBack();
//            Log::error('Sync Error: ' . $e->getMessage());
//            return response()->json(['error' => 'Sync failed'], 500);
//        }
    }
}

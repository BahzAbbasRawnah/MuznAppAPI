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
        $tables = [
            'users' => \App\Models\User::class,
            'schools' => \App\Models\School::class,
            'circles_categories' => \App\Models\CirclesCategory::class,
            'circles' => \App\Models\Circle::class,
            'students' => \App\Models\Student::class,
            'circle_students' => \App\Models\CircleStudent::class,
            'student_attendances' => \App\Models\StudentAttendance::class,
            'homeworks' => \App\Models\Homework::class,
            'student_progress' => \App\Models\StudentProgress::class,
            'digital_libraries' => \App\Models\DigitalLibrary::class,
            'settings' => \App\Models\Settings::class,
        ];

        DB::beginTransaction();
        try {
            foreach ($tables as $table => $model) {
                if ($request->has($table)) {
                    foreach ($request->input($table) as $data) {
                        if (!isset($data['uuid'])) {
                            continue; // Skip if no UUID
                        }

                        $uuid = $data['uuid'];

                        $model::updateOrCreate(
                            ['uuid' => $uuid], // Search by UUID
                            $data // Update or insert data
                        );
                    }
                }
            }

            DB::commit();
            return response()->json(['message' => 'Data synced successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Sync Error: ' . $e->getMessage());
            return response()->json(['error' => 'Sync failed'], 500);
        }
    }
}

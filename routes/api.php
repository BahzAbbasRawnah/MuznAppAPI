<?php

use App\Http\Controllers\API\DatabaseSyncController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SchoolController;
use App\Http\Controllers\API\CirclesCategoryController;
use App\Http\Controllers\API\CircleController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\CircleStudentController;
use App\Http\Controllers\API\StudentAttendanceController;
use App\Http\Controllers\API\HomeworkController;
use App\Http\Controllers\API\StudentProgressController;
use App\Http\Controllers\API\DigitalLibraryController;
use App\Http\Controllers\API\SettingsController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// User Routes
Route::apiResource('users', UserController::class);

// School Routes
Route::apiResource('schools', SchoolController::class);

// Circles Category Routes
Route::apiResource('circles-categories', CirclesCategoryController::class);

// Circle Routes
Route::apiResource('circles', CircleController::class);

// Student Routes
Route::apiResource('students', StudentController::class);

// Circle Student Routes
Route::apiResource('circle-students', CircleStudentController::class);

// Student Attendance Routes
Route::apiResource('student-attendances', StudentAttendanceController::class);


Route::post('/sync', [DatabaseSyncController::class, 'sync']);

// Homework Routes
Route::apiResource('homeworks', HomeworkController::class);

// Student Progress Routes
Route::apiResource('student-progresses', StudentProgressController::class);

// Digital Library Routes
Route::apiResource('digital-libraries', DigitalLibraryController::class);

// Settings Routes
Route::apiResource('settings', SettingsController::class);

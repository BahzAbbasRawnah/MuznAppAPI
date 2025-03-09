<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->string('teacher_uuid')->nullable();
        });
        Schema::table('students', function (Blueprint $table) {
            $table->string('teacher_uuid')->nullable();
            $table->string('user_uuid')->nullable();
        });
        Schema::table('circles', function (Blueprint $table) {
            $table->string('teacher_uuid')->nullable();
            $table->string('school_uuid')->nullable();
        });
        Schema::table('circle_students', function (Blueprint $table) {
            $table->string('teacher_uuid')->nullable();
            $table->string('student_uuid')->nullable();
            $table->string('circle_uuid')->nullable();
        });
        Schema::table('homework', function (Blueprint $table) {
            $table->string('circle_category_uuid')->nullable();
            $table->string('student_uuid')->nullable();
            $table->string('circle_uuid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            //
        });
    }
};

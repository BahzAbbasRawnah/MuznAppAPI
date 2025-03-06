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
        Schema::table('users', function (Blueprint $table) {
            $table->string('uuid')->nullable();
        });
        Schema::table('schools', function (Blueprint $table) {
            $table->string('uuid')->nullable();
        });
        Schema::table('circles', function (Blueprint $table) {
            $table->string('uuid')->nullable();
        });
        Schema::table('students', function (Blueprint $table) {
            $table->string('uuid')->nullable();
        });
        Schema::table('circle_students', function (Blueprint $table) {
            $table->string('uuid')->nullable();
        });
        Schema::table('student_attendance', function (Blueprint $table) {
            $table->string('uuid')->nullable();
        });
        Schema::table('homework', function (Blueprint $table) {
            $table->string('uuid')->nullable();
        });
        Schema::table('student_progress', function (Blueprint $table) {
            $table->string('uuid')->nullable();
        });
        Schema::table('digital_library', function (Blueprint $table) {
            $table->string('uuid')->nullable();
        });
        Schema::table('settings', function (Blueprint $table) {
            $table->string('uuid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('all_tables', function (Blueprint $table) {
            //
        });
    }
};

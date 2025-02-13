<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttendanceTable extends Migration
{
    public function up()
    {
        Schema::create('student_attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('circle_id')->constrained('circles');
            $table->dateTime('attendance_date');
            $table->enum('status', ['none', 'present', 'absent', 'absent_with_excuse', 'early_departure', 'not_listened', 'late'])->default('none');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_attendance');
    }
}

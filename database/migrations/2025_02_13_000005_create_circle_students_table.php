<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircleStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('circle_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('circle_id')->constrained('circles');
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('teacher_id')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('circle_students');
    }
}

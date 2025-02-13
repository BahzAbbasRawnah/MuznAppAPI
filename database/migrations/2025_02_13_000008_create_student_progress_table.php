<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProgressTable extends Migration
{
    public function up()
    {
        Schema::create('student_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('homework_id')->constrained('homework');
            $table->foreignId('student_id')->constrained('students');
            $table->enum('reading_rating', ['excellent', 'very_good', 'good', 'average', 'weak'])->default('good');
            $table->enum('review_rating', ['excellent', 'very_good', 'good', 'average', 'weak'])->default('good');
            $table->enum('telawah_rating', ['excellent', 'very_good', 'good', 'average', 'weak'])->default('good');
            $table->integer('reading_wrong')->default(0);
            $table->integer('tajweed_wrong')->default(0);
            $table->integer('tashqeel_wrong')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_progress');
    }
}

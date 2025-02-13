<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkTable extends Migration
{
    public function up()
    {
        Schema::create('homework', function (Blueprint $table) {
            $table->id();
            $table->foreignId('circle_id')->constrained('circles');
            $table->foreignId('circle_category_id')->constrained('circles_category');
            $table->foreignId('student_id')->constrained('students');
            $table->integer('start_surah_number');
            $table->integer('end_surah_number');
            $table->integer('start_ayah_number');
            $table->integer('end_ayah_number');
            $table->dateTime('homework_date');
            $table->boolean('checked')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('homework');
    }
}

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirclesTable extends Migration
{
    public function up()
    {
        Schema::create('circles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools');
            $table->foreignId('teacher_id')->constrained('users');
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('circle_category_id')->constrained('circles_category');
            $table->string('circle_type')->nullable();
            $table->string('circle_time')->nullable();
            $table->string('jitsi_link')->nullable();
            $table->string('recording_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('circles');
    }
}

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirclesCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('circles_category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('namevalue');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('circles_category');
    }
}

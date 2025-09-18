<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('course_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->unique('name');
            $table->foreignId('course_type_id')->references('id')->on('course_types')
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_levels');
    }
}

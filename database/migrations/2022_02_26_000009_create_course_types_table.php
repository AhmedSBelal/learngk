<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTypesTable extends Migration
{
    public function up()
    {
        Schema::create('course_types', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->index();
            $table->unique('slug');
            $table->timestamps();
        });
    }
}

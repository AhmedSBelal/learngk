<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->index();
            $table->string('exam_link')->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->unique('slug');
            $table->timestamps();
        });
    }
}

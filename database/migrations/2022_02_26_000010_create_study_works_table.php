<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyWorksTable extends Migration
{
    public function up()
    {
        Schema::create('study_works', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->index();
            $table->string('type');
            $table->unique('slug');
            $table->timestamps();
        });
    }
}

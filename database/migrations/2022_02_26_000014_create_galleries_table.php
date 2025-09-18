<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->string('video')->nullable();
            $table->unique('slug');
            $table->string('type')->default('gallery');
            $table->timestamps();
        });
    }
}

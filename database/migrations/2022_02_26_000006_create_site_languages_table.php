<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('site_languages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('locale')->unique();
            $table->timestamps();
        });
    }
}

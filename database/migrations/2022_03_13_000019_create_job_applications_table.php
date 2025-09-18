<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('status')->nullable();
            $table->string('reach')->default('phone')->nullable();
            $table->boolean('approve')->default(0)->nullable();
            $table->string('application_status')->default('pending')->nullable();
            $table->timestamps();
        });
    }
}

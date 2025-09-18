<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJobApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->foreignId('job_id')->nullable()
                ->references('id')
                ->on('jobs');
        });
    }
}

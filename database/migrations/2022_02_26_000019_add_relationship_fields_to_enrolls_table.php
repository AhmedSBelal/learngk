<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEnrollsTable extends Migration
{
    public function up()
    {
        Schema::table('enrolls', function (Blueprint $table) {
            $table->foreignId('course_id', 'course_fk_6080646')
                ->nullable()
                ->references('id')
                ->on('courses');
        });
    }
}

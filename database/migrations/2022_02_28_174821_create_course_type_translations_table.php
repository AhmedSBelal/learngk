<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTypeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_type_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('locale')->index();
            $table->foreignId('course_type_id')->references('id')->on('course_types')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unique(['locale', 'course_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_type_translations');
    }
}

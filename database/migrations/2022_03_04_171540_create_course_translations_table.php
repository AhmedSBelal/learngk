<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('locale')->index();
            $table->longText('short_description');
            $table->longText('description');
            $table->longText('seo_description')->nullable();
            $table->longText('seo_keywords')->nullable();
            $table->foreignId('course_id')->references('id')->on('courses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unique(['locale', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_translations');
    }
}

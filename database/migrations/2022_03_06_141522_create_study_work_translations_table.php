<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyWorkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_work_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('locale')->index();
            $table->longText('short_description');
            $table->longText('seo_description')->nullable();
            $table->longText('seo_keywords')->nullable();
            $table->longText('description');
            $table->foreignId('study_work_id')->references('id')->on('study_works')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unique(['locale', 'study_work_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_work_translations');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_translations', function (Blueprint $table) {
            $table->id();
            $table->string('question')->unique();
            $table->string('locale')->index();
            $table->longText('answer');
            $table->foreignId('faq_id')->references('id')->on('faqs')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unique(['locale', 'faq_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq_translations');
    }
}

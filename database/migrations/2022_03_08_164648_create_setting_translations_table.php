<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->id();
            $table->string('text')->nullable();
            $table->string('locale')->index();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->foreignId('setting_id')->references('id')->on('settings')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unique(['locale', 'setting_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_translations');
    }
}

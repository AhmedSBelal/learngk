<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('course_attend_type')->nullable()->index();
            $table->string('course_book')->nullable();
            $table->integer('participant')->nullable();
            $table->float('price', 8, 2)->nullable();
            $table->time('from')->nullable();
            $table->time('to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('course_attend_type');
            $table->dropColumn('course_book');
            $table->dropColumn('participant');
            $table->dropColumn('price');
            $table->dropColumn('from');
            $table->dropColumn('to');
        });
    }
};

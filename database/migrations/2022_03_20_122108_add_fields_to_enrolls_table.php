<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enrolls', function (Blueprint $table) {
            $table->string('family_name')->nullable();
            $table->date('birthdate')->nullable();
            $table->date('course_start')->nullable();
            $table->date('course_end')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('id_Card')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->string('degree')->nullable();
            $table->string('job')->nullable();
            $table->longText('knowledge')->nullable();
            $table->string('reach_us')->nullable();
            $table->boolean('affiliation_term')->default(0)->nullable();
            $table->boolean('withdrawal_term')->default(0)->nullable();
            $table->boolean('contract')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrolls', function (Blueprint $table) {
            $table->dropColumn('family_name');
            $table->dropColumn('birthdate');
            $table->dropColumn('course_start');
            $table->dropColumn('course_end');
            $table->dropColumn('age');
            $table->dropColumn('gender');
            $table->dropColumn('id_card');
            $table->dropColumn('parent_phone');
            $table->dropColumn('nationality');
            $table->dropColumn('address');
            $table->dropColumn('degree');
            $table->dropColumn('job');
            $table->dropColumn('knowledge');
            $table->dropColumn('reach_us');
            $table->dropColumn('affiliation_term');
            $table->dropColumn('withdrawal_term');
            $table->dropColumn('contract');
        });
    }
}

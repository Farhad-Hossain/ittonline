<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAppBasicInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_basic_infos', function (Blueprint $table) {
            $table->unsignedInteger('number_of_happy_students')->default(0);
            $table->unsignedInteger('number_of_done_projects')->default(0);
            $table->unsignedInteger('number_of_awards')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_basic_infos', function (Blueprint $table) {
            $table->dropColumn('number_of_happy_students');
            $table->dropColumn('number_of_done_projects');
            $table->dropColumn('number_of_awards');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToAppBasicInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_basic_infos', function (Blueprint $table) {
            if (!Schema::hasColumn('app_basic_infos', 'location_google_map_embedded_link')) $table->mediumText('location_google_map_embedded_link')->nullable();
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
            //
        });
    }
}

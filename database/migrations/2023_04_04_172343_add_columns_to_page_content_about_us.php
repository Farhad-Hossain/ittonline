<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPageContentAboutUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_content_about_us', function (Blueprint $table) {
            $table->unsignedInteger('is_menu')->default(0);
            $table->string('menu_name')->nullable();
            $table->string('menu_slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_content_about_us', function (Blueprint $table) {
            //
        });
    }
}

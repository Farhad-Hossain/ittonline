<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('is_menu')->default(0);
            $table->string('menu_name')->nullable();
            $table->string('menu_slug')->nullable();
            $table->string('image');
            $table->text('short_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_menus');
    }
}

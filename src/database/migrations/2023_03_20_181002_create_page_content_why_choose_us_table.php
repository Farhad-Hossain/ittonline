<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageContentWhyChooseUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_content_why_choose_us', function (Blueprint $table) {
            $table->id();
            $table->string('content_best_it_training_industry');
            $table->string('content_professional_trainers');
            $table->string('content_award_winning');
            $table->string('content_support');
            $table->string('middle_photo');
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
        Schema::dropIfExists('page_content_why_choose_us');
    }
}

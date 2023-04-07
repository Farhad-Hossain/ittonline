<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorpTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corp_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('training_title');
            $table->unsignedInteger('total_month')->default(0);
            $table->string('thumbnail')->nullable();
            $table->text('training_details')->nullable();
            $table->unsignedInteger('category_id')->default(0);
            $table->unSignedTinyInteger('is_active')->default(1);
            $table->unSignedTinyInteger('is_category')->default(0);
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
        Schema::dropIfExists('corp_trainings');
    }
}

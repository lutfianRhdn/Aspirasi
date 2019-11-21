<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspirationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspirations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('aspiration_category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 255);
            $table->text('aspiration');
            $table->string('aspiration_image')->nullable();
            $table->smallInteger('is_anonim')->nullable();
            $table->smallInteger('is_accepted')->nullable();
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
        Schema::dropIfExists('aspirations');
    }
}

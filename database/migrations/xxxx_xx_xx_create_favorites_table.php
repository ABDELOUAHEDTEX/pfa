<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('courrier_id');
            $table->timestamps();

            $table->foreign('courrier_id')->references('id')->on('courriers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}

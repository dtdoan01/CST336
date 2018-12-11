<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            //gameName, price, userRating, publisher, platformId, genreId, imgUrl, description
            $table->increments('id');
            $table->string('name');
            $table->string('slug', 128)->unique();
            $table->float('price');
            $table->integer('score');
            $table->integer('votes');

            $table->string('publisher');

            $table->integer('genre_id');
            $table->string('image_url')->nullable();
            $table->text('description')->nullable();

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
        Schema::dropIfExists('games');
    }
}

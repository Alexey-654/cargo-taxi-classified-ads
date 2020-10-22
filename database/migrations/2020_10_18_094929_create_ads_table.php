<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('phone', 12)->unique();
            $table->string('type');
            $table->integer('cargo_capacity');
            $table->integer('body_length');
            $table->integer('body_width');
            $table->integer('body_height');
            $table->boolean('back_door')->default(true);
            $table->boolean('side_door')->default(false);
            $table->boolean('up_door')->default(false);
            $table->boolean('open_door')->default(false);
            $table->boolean('movers')->default(true);
            $table->string('title');
            $table->text('description');
            $table->string('city_price');
            $table->string('out_of_town_price');
            $table->string('photo');
            $table->string('state')->default('published');
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
        Schema::dropIfExists('ads');
    }
}

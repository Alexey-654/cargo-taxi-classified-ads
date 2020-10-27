<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColomnsTypeAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->decimal('body_length', 3, 1)->change();
            $table->decimal('body_width', 2, 1)->change();
            $table->decimal('body_height', 2, 1)->change();
            $table->integer('city_price')->change();
            $table->integer('out_of_town_price')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

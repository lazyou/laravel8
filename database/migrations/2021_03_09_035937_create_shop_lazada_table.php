<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopLazadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_lazada', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id');
            $table->string('name_company');
            $table->integer('seller_id');
            $table->string('name');
            $table->string('short_code', 10);
            $table->string('logo_url', 10);
            $table->string('email', 30);
            $table->boolean('cd');
            $table->string('location', 30);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_lazada');
    }
}

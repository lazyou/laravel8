<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopShopeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_shopee', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id');
            $table->string('shop_name');
            $table->string('country', 5);
            $table->string('shop_description');
            $table->string('videos');
            $table->string('images');
            $table->tinyInteger('disable_make_offer');
            $table->boolean('enable_display_unitno');
            $table->integer('item_limit');
            $table->string('status', 10);
            $table->tinyInteger('installment_status');
            $table->boolean('is_cb');
            $table->integer('non_pre_order_dts');
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
        Schema::dropIfExists('shop_shopee');
    }
}

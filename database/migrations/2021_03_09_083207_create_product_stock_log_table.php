<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStockLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stock_log', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->tinyInteger('type');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('promp')->nullable();
            $table->integer('promp_id')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('product_stock_log');
    }
}

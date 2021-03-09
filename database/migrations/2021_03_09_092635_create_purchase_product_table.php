<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_product', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouse_id');
            $table->integer('purchase_id');
            $table->integer('product_id');
            $table->decimal('cost')->comment('采购成本')->nullable();
            $table->integer('package')->comment('打包件数')->nullable();
            $table->integer('quantity')->comment('产品数量')->nullable();
            $table->integer('confirm_package')->comment('确认打包件数')->nullable();
            $table->integer('confirm_quantity')->comment('确认产品数量')->nullable();
            $table->tinyInteger('quantity_status');
            $table->string('remark', 100)->nullable();
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
        Schema::dropIfExists('purchase_product');
    }
}

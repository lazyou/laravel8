<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('warehouse_id');
            $table->tinyInteger('domestic_status');
            $table->string('domestic_number', 30)->index()->nullable();
            $table->tinyInteger('overseas_status');
            $table->string('overseas_number', 30)->index()->nullable();
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
        Schema::dropIfExists('purchase');
    }
}

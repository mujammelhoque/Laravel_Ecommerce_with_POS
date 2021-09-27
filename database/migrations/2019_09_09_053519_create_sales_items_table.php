<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_id')->nullable();
            $table->foreign('sales_id')->references('id')->on('sales')->onDelete('restrict');

            $table->unsignedBigInteger('items_id')->nullable();
            $table->foreign('items_id')->references('id')->on('items')->onDelete('restrict');

            $table->double("quantity");
            $table->double("unit_price");
            $table->double("cost_price");
            $table->double("discount_percent")->default(0.0);
            $table->json('attributes')->nullable();

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
        Schema::dropIfExists('sales_items');
    }
}

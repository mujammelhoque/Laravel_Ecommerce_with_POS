<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReceivingsItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivings_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receivings_id')->nullable();
            $table->foreign('receivings_id')->references('id')->on('receivings')->onDelete('restrict');
            $table->unsignedBigInteger('items_id')->nullable();
            $table->foreign('items_id')->references('id')->on('items')->onDelete('restrict');
            $table->double('quantity',8,2);
            $table->double('unit_price',8,2);
            $table->double('discount_percent',8,2);
            $table->double('cost_price',8,2);
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
        //
    }
}

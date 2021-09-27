<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('restrict');
            $table->string('sku');
            $table->text('description')->nullable();
            $table->decimal('cost_price');
            $table->decimal('unit_price');
            $table->integer('reorder_level');
            $table->double('quantity');
            $table->set('unit',['gm','kg','lb','piece','dozon','l','ml','inch','foot']);            
            $table->string('baseimage')->nullable();
            $table->tinyInteger('alt_description')->default(0);
            $table->tinyInteger('has_serial')->default(0);
            $table->string('serialno')->nullable();
            $table->tinyInteger('tax1')->nullable();
            $table->tinyInteger('tax2')->nullable();     
            $table->json("attributes");
            $table->string('loc')->comment("item location in store");
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
        Schema::dropIfExists('items');
    }
}

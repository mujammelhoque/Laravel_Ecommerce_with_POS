<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string("invoice_id");

            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict');

            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('restrict');

            $table->string("comments")->nullable();

            $table->double("total");
            $table->double("discount");
            $table->string("coupon")->nullable();
            $table->double("finaltotal");
            $table->set("payment_type",['cash','bkash','nagad','ucash','rocket']);
            $table->set("payment_status",['incomplete','due','complete','partial'])->dafault("complete");
            $table->set("sale_type",['store','web'])->dafault("store");

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
        Schema::dropIfExists('sales');
    }
}

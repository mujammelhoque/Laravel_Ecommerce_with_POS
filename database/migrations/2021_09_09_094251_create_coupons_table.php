<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon');
            $table->integer('value');
            $table->date('coupon_validity')->nullable();
            $table->float('price_limit')->nullable(); //Price limit
            $table->integer('used')->default(0)->comment('How Many time used this coupon'); //How many time used this coupon
            $table->integer('max_used')->nullable()->comment('How Many time you want  used this coupon'); //limit for used this coupon
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
        Schema::dropIfExists('coupons');
    }
}

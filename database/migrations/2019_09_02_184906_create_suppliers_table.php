<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('company_name');
            $table->string('agency_name');
            $table->string('account_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->set('gender',['m','f','o']);
            $table->string('phone',15);
            $table->string('email',60);            
            $table->string('address1',150);
            $table->string('address2',150);
            $table->string('city',50);
            $table->string('state',50);
            $table->string('zip',10);
            $table->string('country',50);
            $table->string('comments');            
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
        Schema::dropIfExists('suppliers');
    }
}

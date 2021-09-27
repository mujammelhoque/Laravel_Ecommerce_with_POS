<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('first_name',40);
            $table->string('last_name',40);
            $table->set('gender',['m','f','o']);
            $table->string('email',60);
            $table->string('phone',15);
            $table->string('address1',150);
            $table->string('address2',150);
            $table->string('city',50);
            $table->string('state',50);
            $table->string('zip',10);
            $table->string('country',50);
            $table->string('company');
            $table->string('account');
            $table->decimal('total');
            $table->integer('discount');
            $table->tinyInteger('taxable')->default(0);
            $table->text('comments');
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
        Schema::dropIfExists('customers');
    }
}

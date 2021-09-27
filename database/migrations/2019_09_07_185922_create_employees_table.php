<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('loginname');
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->set('gender',['m','f','o']);
            $table->string('phone',15);
            $table->string('email',60);
            $table->string('image');
            $table->string('employeeid')->nullable();
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
        Schema::dropIfExists('employees');
    }
}

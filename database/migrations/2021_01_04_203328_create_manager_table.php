<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('full_name', 30);
            $table->string('email', 50);
            $table->integer('phone')->nullable();
            $table->date('dob')->nullable();
            $table->string('address', 100)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('country', 30)->nullable();
            $table->string('company_name', 50);
            $table->date('joining_date')->nullable();
            $table->string('user_name', 30);
            $table->string('password', 30);
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manager');
    }
}

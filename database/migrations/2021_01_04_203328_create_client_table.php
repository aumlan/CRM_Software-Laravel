<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->integer('client_id', true);
            $table->string('username', 50)->unique('username');
            $table->string('password', 50);
            $table->string('full_name', 50);
            $table->integer('contact_no');
            $table->string('email', 50);
            $table->string('address', 100);
            $table->string('country', 50);
            $table->string('gender', 20);
            $table->date('dob')->default('CURRENT_TIMESTAMP');
            $table->string('status', 20)->default('Active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}

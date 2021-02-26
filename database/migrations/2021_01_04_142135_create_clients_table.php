<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('full_name', 30);
            $table->string('email', 50);
            $table->integer('phone');
            $table->string('address', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 20)->nullable();
            $table->string('website')->nullable();
            $table->string('added_by', 50)->nullable();
            $table->date('adding_date')->nullable();
            $table->string('status', 10)->nullable();
            $table->string('password', 30);
            $table->string('billing_city', 100)->nullable();
            $table->string('billing_state', 100)->nullable();
            $table->string('billing_country', 20)->nullable();
            $table->integer('billing_zip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

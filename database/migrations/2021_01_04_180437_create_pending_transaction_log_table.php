<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingTransactionLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_transaction_log', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('type');
            $table->integer('company_id');
            $table->integer('client_id');
            $table->string('description');
            $table->integer('price');
            $table->date('date');
            $table->date('creation_time');
            $table->string('created_by', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pending_transaction_log');
    }
}

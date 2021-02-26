<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 50);
            $table->string('subject', 100);
            $table->string('body');
            $table->string('customer_name', 30);
            $table->date('starting_date');
            $table->date('deadline_date');
            $table->string('status', 20);
            $table->string('address');
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('country', 20);
            $table->integer('zip_code');
            $table->string('email', 50);
            $table->integer('phone');
            $table->string('item', 100);
            $table->integer('quantity');
            $table->integer('rate');
            $table->integer('client_id');
            $table->integer('manager_id');
            $table->integer('company_id');
            $table->string('posted_by', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal');
    }
}

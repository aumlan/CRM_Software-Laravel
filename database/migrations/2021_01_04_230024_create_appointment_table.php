<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 75);
            $table->string('body')->nullable();
            $table->date('creation_date');
            $table->date('appointment_date');
            $table->integer('manager_id')->index('def');
            $table->integer('clients_id')->index('abc');
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
        Schema::dropIfExists('appointment');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->foreign('clients_id', 'abc')->references('id')->on('clients')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('manager_id', 'def')->references('id')->on('manager')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->dropForeign('abc');
            $table->dropForeign('def');
        });
    }
}

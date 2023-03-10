<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_booking', function (Blueprint $table) {
            $table->foreign('concer_id','ticket_booking_to_concer')->references('id')->on('concer')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_booking', function (Blueprint $table) {
            $table->dropForeign('ticket_booking_to_concer');
        });
    }
};

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
        Schema::create('ticket_booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('concer_id')->index('ticket_booking_to_concer');
            $table->string('ticketId', 20);
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 100)->unique();
            $table->enum('gender', ['L', 'P']);
            $table->string('pob', 20);
            $table->date('dob');
            $table->string('address', 100);
            $table->enum('status', [0, 1])->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('ticket_booking');
    }
};

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
        Schema::create('concer', function (Blueprint $table) {
            $table->id();
            $table->string('concer_name', 100);
            $table->string('poster')->nullable();
            $table->string('price', 15);
            $table->longText('concer_place');
            $table->string('quota', 10);
            $table->datetime('concer_time');
            $table->date('open_date');
            $table->date('close_date');
            $table->enum('is_open', [0, 1])->default(0);
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
        Schema::dropIfExists('concer');
    }
};

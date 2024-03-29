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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('doctor_id')->references('id')->on('doctors');
            $table->string('name');
            $table->string('phone');
            $table->date('birthday');
            $table->text('address')->nullable();
            $table->time('time');
            $table->date('date');
            $table->string('status');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->text('diagnosis')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('reservations');
    }
};

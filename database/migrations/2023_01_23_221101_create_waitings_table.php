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
        Schema::create('waitings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('gender_id')->constrained('genders')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('address');
            $table->date('birthday');
            $table->string('status');
            $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('waitings');
    }
};

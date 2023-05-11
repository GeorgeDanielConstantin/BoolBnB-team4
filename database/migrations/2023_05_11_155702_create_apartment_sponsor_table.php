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
        Schema::create('apartment_sponsor', function (Blueprint $table) {
            $table->id();

            $table->foreignId('apartment_id')
            ->constrained()
            ->cascadeOnDelete();
            $table->foreignId('sponsor_id')
            ->constrained()
            ->cascadeOnDelete();
            $table->date('starting_date');
            $table->date('ending_date');
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
        Schema::dropIfExists('apartment_sponsor');
        Schema::dropColumn('apartment_id');
        Schema::dropColumn('sponsor_id');
    }
};

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
        Schema::create('apartments', function (Blueprint $table) {

            $table->id();
            
            $table->string('title', 60);
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('address', 70);
            $table->string('latitude', 18);
            $table->string('longitude', 18);
            $table->integer('rooms')->unsigned();
            $table->integer('bathrooms')->unsigned();
            $table->integer('beds')->unsigned();
            $table->integer('square_meters')->unsigned();
            $table->boolean('visibility')->default(0);
        
            // timestamps() genera le colonne created_at ed updated_at
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
        Schema::dropIfExists('apartments');
    }
};

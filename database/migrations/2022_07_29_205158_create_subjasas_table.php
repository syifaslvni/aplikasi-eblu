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
        Schema::create('subjasas', function (Blueprint $table) {
            $table->id();
            $table->string('title', 70);
            $table->string('slug',)->unique();
            $table->timestamps();

            $table->unsignedBigInteger('jenisjasa_id');
            $table->foreign('jenisjasa_id')->references('id')->on('jenisjasas')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjasas');
    }
};

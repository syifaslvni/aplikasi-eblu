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
        Schema::create('subsubjasas', function (Blueprint $table) {
            $table->id();
            $table->string('title', 70);
            $table->string('slug',)->unique();
            $table->timestamps();

            $table->unsignedBigInteger('subjasa_id');
            $table->foreign('subjasa_id')->references('id')->on('subjasas')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subsubjasas');
    }
};

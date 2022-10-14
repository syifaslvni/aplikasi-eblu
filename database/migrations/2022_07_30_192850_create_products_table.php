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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 70);
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->string('description', 150);
            $table->text('content');
            $table->timestamps();
            
            $table->unsignedBigInteger('jenisjasa_id');
            $table->foreign('jenisjasa_id')->references('id')->on('jenisjasas')->onDelete('cascade');
            
            $table->unsignedBigInteger('subjasa_id');
            $table->foreign('subjasa_id')->references('id')->on('subjasas')->onDelete('cascade');
            
            $table->unsignedBigInteger('subsubjasa_id');
            $table->foreign('subsubjasa_id')->references('id')->on('subsubjasas')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

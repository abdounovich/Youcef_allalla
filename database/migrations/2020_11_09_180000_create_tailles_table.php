<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tailles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('taille');
            $table->text('quantity');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')
            ->references('id')->on('colors')
            ->onDelete('cascade');
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
        Schema::dropIfExists('tailles');
    }
}

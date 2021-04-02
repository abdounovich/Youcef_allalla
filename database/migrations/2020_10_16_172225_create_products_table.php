<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nom');
            $table->text('product_type');
            $table->text('photo');
            $table->text('descreption');
            $table->text('prix');
            $table->text('achat');
            $table->text('code_interne');
            $table->text('quantity');
            $table->unsignedBigInteger('SubCat_id');
            $table->foreign('SubCat_id')
            ->references('id')->on('sub_categories')
            ->onDelete('cascade');
            $table->text('type');
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
        Schema::dropIfExists('products');
    }
}

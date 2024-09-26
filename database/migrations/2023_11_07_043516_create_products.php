<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
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
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->text('image')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discountprice')->nullable();
            $table->integer('discount_percentage')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('In Stock');
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

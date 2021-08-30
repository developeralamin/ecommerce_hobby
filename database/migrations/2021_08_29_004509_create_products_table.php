<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
    $table->id();
    $table->integer('category_id')->comment('category_id=category');
    $table->integer('subcategory_id')->comment('subcategory_id=subcategory');
    $table->string('product_name')->nullable();
    $table->string('slug')->nullable();
    $table->string('product_summary')->nullable();
    $table->text('product_description')->nullable();
    $table->string('product_price')->nullable();
    $table->string('product_quantity')->nullable();
    $table->string('product_thumbnail')->nullable();

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

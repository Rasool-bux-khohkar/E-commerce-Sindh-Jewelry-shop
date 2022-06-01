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
            $table->increments('id');
            $table->integer('user_role_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->longText('description');
            $table->integer('price');
            $table->integer('quantity');
            $table->tinyInteger('is_active');
            $table->integer('low_inventory');
            $table->tinyInteger('is_featured');
            $table->tinyInteger('is_free_shipping');
            $table->integer('shipping_charges');
            $table->tinyInteger('is_rating_allowed');
            $table->tinyInteger('is_comment_allowed');
            $table->foreign('user_role_id')->references('id')->on('user_roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_role_id')->unsigned();
            $table->longText('billing_address')->nullable();
            $table->longText('shipping_address');
            $table->string('city');
            $table->string('state');
            $table->string('zip')->nullable();
            $table->enum('payment_method', ['Cash on delivery', 'Jazz Cash', 'Easy Paisa']);
            $table->enum('status', ['Order Placed', 'On The Way', 'Shipped'])->defaultValue('Order Placed');
            $table->foreign('user_role_id')->references('id')->on('user_roles')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('orders');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartmaster', function (Blueprint $table) {
           $table->bigIncrements('cart_id');
            $table->integer('user_id');
           $table->integer('product_id');

            $table->string('p_name');
            $table->float('p_price', 8, 2);
            $table->integer('p_quantity');
             $table->string('p_image');
            $table->float('subtotal_price', 8, 2);


            $table->timestamps();
            $table->softDeletes('is_deleted',0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartmaster');
    }
}

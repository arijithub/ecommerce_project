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
            $table->increments('product_id');
            $table->integer('category_id')->unique();
            $table->integer('subcategory_id')->unique();
			$table->string('p_name');
            $table->string('p_image');
            $table->integer('price');
            //$table->float('price', 8, 2);
            $table->integer('discount');
            
        
            $table->timestamps();
            //$table->softDeletes('is_deleted',0);
            //$table->dropSoftDeletes();
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

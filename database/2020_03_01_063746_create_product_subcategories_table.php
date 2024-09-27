<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::enableForeignKeyConstraints();
        Schema::create('product_subcategories', function (Blueprint $table) {
            $table->increments('subcategory_id');
			$table->integer('category_id')->unique();
			// $table->foreign('category_id')->references('category_id')->on('product_categories');			 
			$table->string('name');
			$table->string('image');
            $table->timestamps();
            $table->softDeletes(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_subcategories');
    }
}

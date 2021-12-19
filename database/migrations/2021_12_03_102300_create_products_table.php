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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('name');
            $table->string('slug');
            $table->string('thumbnail');
            $table->text('description');
            $table->text('short_description');
            $table->integer('hot_deals')->nullable();
            $table->integer('features')->nullable();
            $table->string('code');
            $table->string('qty');
            $table->string('tags');
            $table->string('size')->nullable();
            $table->string('color');
            $table->string('price');
            $table->string('discount')->nullable();            
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->string('digital_file')->nullable();
            $table->integer('status')->default(0);
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

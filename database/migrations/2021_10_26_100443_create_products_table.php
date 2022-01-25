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
            $table->string('name');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('brand_id');
            $table->text('short_desc');
            $table->longtext('long_desc')->nullable();
            $table->double('price');
            $table->double('old_price');
            $table->double('shipping_price');
            $table->integer('delivery_date');
            $table->integer('return_date');
            $table->string('seller');
            $table->string('logo');
            $table->string('code');
            $table->string('availability')->default(0);
            $table->string('feature')->default(0);
            $table->string('special')->default(0);
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

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
            $table->unsignedBigInteger('manufacturer_id')->nullable();
            $table->unsignedBigInteger('category_default_id')->nullable();
            $table->string('article_number')->nullable();
            $table->text('description')->nullable();
            $table->text('description_short')->nullable();
            $table->string('link_rewrite')->nullable();
            $table->string('name');
            $table->decimal('price',20,6)->default('0.000000');
            $table->decimal('discount_price',20,6)->default('0.000000');
            $table->decimal('width',20,6)->default('0.000000');
            $table->decimal('height',20,6)->default('0.000000');
            $table->decimal('depth',20,6)->default('0.000000');
            $table->decimal('weight',20,6)->default('0.000000');
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

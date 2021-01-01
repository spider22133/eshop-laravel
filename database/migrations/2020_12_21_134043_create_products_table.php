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
            $table->integer('price')->default(0);
            $table->integer('discount_price')->default(0);
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->integer('depth')->default(0);
            $table->integer('weight')->default(0);
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

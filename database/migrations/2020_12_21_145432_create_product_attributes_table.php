<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('article_number')->nullable();
            $table->text('description')->nullable();
            $table->text('description_short')->nullable();
            $table->string('link_rewrite')->nullable();
            $table->decimal('price',20,6)->default('0.000000');
            $table->decimal('discount_price',20,6)->default('0.000000');
            $table->decimal('weight',20,6)->default('0.000000');
            $table->unsignedInteger('quantity')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}

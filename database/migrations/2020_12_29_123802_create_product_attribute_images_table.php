<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributeImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_images', function (Blueprint $table) {
            $table->unsignedBigInteger('product_attribute_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->timestamps();

            $table->primary(['product_attribute_id','image_id'],'pai_id');
            $table->foreign('product_attribute_id','pat_id')->references('id')->on('product_attributes')->onDelete('cascade');
            $table->foreign('image_id', 'o_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute_images');
    }
}

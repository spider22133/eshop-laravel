<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributeCombinationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_combination', function (Blueprint $table) {
            $table->unsignedBigInteger('attribute_id')->nullable();
            $table->unsignedBigInteger('product_attribute_id')->nullable();
            $table->timestamps();

            $table->primary(['attribute_id','product_attribute_id'],'apa_id');
            $table->foreign('attribute_id','a_id')->references('id')->on('attributes');
            $table->foreign('product_attribute_id', 'pa_id')->references('id')->on('product_attributes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute_combination');
    }
}

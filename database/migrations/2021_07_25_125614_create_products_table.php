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
            $table->string('storeId');
            $table->string("title");
            $table->longText("description")->nullable();
            $table->string("media")->nullable();
            $table->double("price", 8, 2)->nullable();
            $table->double("compareAtPrice", 8, 2)->nullable();
            $table->double("costPerItem", 8, 2)->nullable();
            $table->boolean("chargeTax")->nullable();
            $table->string("sku")->nullable();
            $table->string("barcode")->nullable();
            $table->integer("available")->nullable();
            $table->boolean("physicalProduct")->nullable();
            $table->double("weight", 5, 1)->nullable();
            $table->string("weightUnit")->nullable();
            $table->string("country")->nullable();
            $table->string("hsCode")->nullable();
            $table->longText("variants")->nullable();
            $table->string("pageTitle")->nullable();
            $table->longText("pageDescription")->nullable();
            $table->string("pageUrl")->nullable();
            $table->string("status")->nullable();
            $table->string("onlineStore")->nullable();
            $table->dateTime("availableTime")->nullable();
            $table->string("productType")->nullable();
            $table->string("vendor")->nullable();
            $table->string("collections")->nullable();
            $table->string("tags")->nullable();
            $table->string("themeTemplate")->nullable();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_details', function (Blueprint $table) {
            $table->id();
            $table->string('storeName');
            $table->string('firstName');
            $table->string('lastName');
            $table->text('address');
            $table->string('apartment');
            $table->integer('postcode');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->bigInteger('phone');
            $table->string('website')->nullable();
            $table->boolean('registered');
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
        Schema::dropIfExists('admin_details');
    }
}

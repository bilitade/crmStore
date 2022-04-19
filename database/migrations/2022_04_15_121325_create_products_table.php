<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger("store_id");
            $table->string("user_id")->nullable();
            $table->string("slug");
            $table->string("name");
            $table->string("description");
            $table->unsignedBigInteger("category_id");
            $table->string("status")->default('active');
            $table->string("image")->nullable();
            $table->float('price');

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
};

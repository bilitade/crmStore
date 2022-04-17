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
            $table->unsignedBigInteger("store_id")->default(1);
            $table->string("user_id")->nullable();
            $table->string("name");
            $table->string("description");
            $table->string("category_id")->nullable();
            $table->string("status")->default('active');
            $table->string("image")->nullable();
            $table->double("price",5,2 ,true);

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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->foreign("customer_id")->references("id")->on("customers");
            $table->string("dilevary_address_city");
            $table->string("dilevary_address_state");
            $table->string("dilivary_address");
            $table->string("pincode");
            $table->string("total_prise");
            $table->string("total_quantaty");
            $table->string("payment_methord");
            $table->tinyInteger("order_status")->default("0")->comment("0=pending,1=completed,2=canceled");
            $table->tinyInteger("payment_status")->default("0")->comment("0=pending,1=completed");
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
        Schema::dropIfExists('orders');
    }
};

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
            $table->unsignedBigInteger("customer_id")->nullable();
            $table->unsignedBigInteger("product_id")->nullable();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("phone_no");
            $table->mediumText("dilivary_address");
            $table->string("pincode");
            $table->decimal("total_prise", 10, 2);
            $table->bigInteger("total_quantaty");
            $table->string("payment_mode");
            $table->tinyInteger("order_status")->default("0")->comment("0=pending,1=completed,2=canceled");
            $table->tinyInteger("payment_status")->default("0")->comment("0=pending,1=completed");

            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade");
            $table->foreign("product_id")->references("id")->on("product")->onDelete("cascade");
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

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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('type',100);
            $table->string('branch_id');
            $table->string('date',50);
            $table->string('time',30);
            $table->string('customer_id',50);
            $table->string('receiver_name',50);
            $table->integer('receiver_phone'); 
            $table->string('receiver_address');   
            $table->string('to_branch_id',50);
            $table->string('to_area_id',50);
            $table->string('from_area_id',20);
            $table->string('payment_type',20);
            $table->string('pay_method',20);
            $table->string('pay_status',20);
            $table->string('shipment_id');
            $table->string('product_description',500);
            $table->integer('quantity');
            $table->integer('shipping_cost');
            $table->string('status',30);
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
        Schema::dropIfExists('shipments');
    }
};

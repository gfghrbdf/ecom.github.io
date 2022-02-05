<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('state_id');
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->integer('post_code');
            $table->text('notes');
            $table->string('payment_type');
            $table->string('payment_method');
            $table->string('transaction_id');
            $table->string('currency');
            $table->float('ammount',8,2);
            $table->string('order_number');
            $table->integer('invoice_no');
            $table->string('ordar_date');
            $table->string('ordar_month');
            $table->string('ordar_year');
            $table->string('confirem_date')->nullable();
            $table->string('processing_date')->nullable();
            $table->string('picked_date')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('dalivered_date')->nullable();
            $table->string('canceled_date')->nullable();
            $table->string('return_date')->nullable();
            $table->string('return_reson')->nullable();
            $table->string('status');
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
}

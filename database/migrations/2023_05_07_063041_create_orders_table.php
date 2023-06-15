<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->float('order_amount');
            $table->float('order_tax');
            $table->string('order_status');
            $table->integer('order_traking_number');

            $table->string('order_user_name');
            $table->string('order_user_email');
            $table->bigInteger('order_user_phone');
            $table->string('order_user_address')->nullable();
            $table->string('order_user_address2')->nullable();
            $table->string('order_user_city')->nullable();
            $table->string('order_user_country')->nullable();

            $table->enum('request_type', ['delivery', 'resturant']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

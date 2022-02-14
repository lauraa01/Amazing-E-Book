<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignId('account_id');
            $table->foreignId('ebook_id');
            // $table->date('order_date')->nullable();

            $table->foreign('account_id')->references('id')->on('account')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ebook_id')->references('ebook_id')->on('ebook')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('order');
    }
}

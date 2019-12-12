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
            $table->bigIncrements('id');
            $table->bigInteger('idInvoice')->unsigned();
            $table->bigInteger('idProduct')->unsigned();
            $table->bigInteger('idEmployee')->unsigned();
            $table->integer('units')->unsigned();
            $table->float('price', 5, 2)->unsigned();
            $table->boolean('delivered');
            $table->foreign('idInvoice')->references('id')->on('invoice')->onDelete('cascade');
            $table->foreign('idProduct')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('idEmployee')->references('id')->on('employee')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
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

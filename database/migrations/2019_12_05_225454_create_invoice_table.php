<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('table')->unsigned();
            $table->time('open');
            $table->bigInteger('idOpenEmployee')->unsigned();
            $table->time('close')->nullable();
            $table->bigInteger('idCloseEmployee')->nullable()->unsigned();
            $table->float('total', 5, 2)->unsigned();
            $table->foreign('idOpenEmployee')->references('id')->on('employee')->onDelete('cascade');
            $table->foreign('idCloseEmployee')->references('id')->on('employee')->onDelete('cascade');
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
        Schema::dropIfExists('invoice');
    }
}

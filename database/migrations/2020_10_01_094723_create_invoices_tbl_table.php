<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTblTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->integer('invoice_number');
            $table->string('invoice_month');
            $table->double('invoice_money');
            $table->string('tnx_number');
            $table->string('paid_status');
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
        Schema::dropIfExists('invoices_tbl');
    }
}

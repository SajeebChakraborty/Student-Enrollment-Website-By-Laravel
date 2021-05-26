<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsDetailsTblTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_details_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('roll');
            $table->string('phone');
            $table->string('email');
            $table->string('image');
            $table->string('birth_date');
            $table->string('password');
            $table->integer('invoice_number')->nullable();
            $table->double('invoice_amount')->nullable();
            $table->string('created_date_time')->nullable();
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
        Schema::dropIfExists('students_details_tbl');
    }
}

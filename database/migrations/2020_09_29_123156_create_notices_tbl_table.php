<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTblTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('date_time');
            $table->string('title');
            $table->string('details');
            $table->string('file');
            $table->string('read_check');
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
        Schema::dropIfExists('notices_tbl');
    }
}

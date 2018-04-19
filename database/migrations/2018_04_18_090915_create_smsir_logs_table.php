<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsirLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smsir_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from',100);
            $table->string('to',100);
            $table->string('message',500);
            $table->boolean('status');
            $table->string('response',500);
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
        Schema::dropIfExists('smsir_logs');
    }
}

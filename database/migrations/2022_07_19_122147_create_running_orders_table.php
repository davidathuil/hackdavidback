<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunningOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('running_orders', function (Blueprint $table) {
            $table->id('id_run_orders');
            $table->string('name_run_orders');
            $table->date('start_date_run_orders');
            $table->time('time_run_orders');
            $table->integer('teams_quantity_run_orders');
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
        Schema::dropIfExists('running_orders');
    }
}

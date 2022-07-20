<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsRunningOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_running_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ro_tableLinks_tro');
            $table->integer('id_team_tableLinks_tro');
            $table->integer('running_order_tableLinks_tro');
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
        Schema::dropIfExists('teams__running_orders');
    }
}

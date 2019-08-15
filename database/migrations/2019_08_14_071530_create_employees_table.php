<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fio');
            $table->float('salary')->unsigned();
            $table->timestamp('work_start_at')->nullable();
            $table->string('position')->default('boss');
            $table->bigInteger('boss_id')->unsigned()->default(1);
            $table->string('avatar');
            $table->string('thubnaill');
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
        Schema::dropIfExists('employees');
    }
}

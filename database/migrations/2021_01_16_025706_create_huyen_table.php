<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('h_ma')
                    ->autoIncrement();
            $table->string('h_ten', 50);
            $table->unsignedTinyInteger('t_ma');

            $table->foreign('t_ma')
                    ->references('t_ma')
                    ->on('tinh')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('huyen');
    }
}

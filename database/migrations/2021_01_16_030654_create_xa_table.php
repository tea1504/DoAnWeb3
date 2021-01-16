<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xa', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('x_ma')
                    ->autoIncrement();
            $table->string('x_ten', 50);
            $table->unsignedTinyInteger('h_ma');

            $table->foreign('h_ma')
                    ->references('h_ma')
                    ->on('huyen')
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
        Schema::dropIfExists('xa');
    }
}

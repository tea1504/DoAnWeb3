<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('nv_ma', 10);
            $table->unsignedInteger('q_ma');

            $table->primary(['nv_ma', 'q_ma']);

            $table->foreign('nv_ma')
                    ->references('nv_ma')
                    ->on('nhanvien')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('q_ma')
                    ->references('q_ma')
                    ->on('quyen')
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
        Schema::dropIfExists('user_quyen');
    }
}

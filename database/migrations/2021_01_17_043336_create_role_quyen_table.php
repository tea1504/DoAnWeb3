<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_quyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedInteger('role_ma');
            $table->unsignedInteger('q_ma');

            $table->primary(['q_ma', 'role_ma']);

            $table->foreign('q_ma')
                    ->references('q_ma')
                    ->on('quyen')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('role_ma')
                    ->references('role_ma')
                    ->on('role')
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
        Schema::dropIfExists('role_quyen');
    }
}

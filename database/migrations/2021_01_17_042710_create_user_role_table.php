<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('nv_ma', 10);
            $table->unsignedInteger('role_ma');

            $table->primary(['nv_ma', 'role_ma']);
            $table->foreign('nv_ma')
                    ->references('nv_ma')
                    ->on('nhanvien')
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
        Schema::dropIfExists('user_role');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoisinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noisinh', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedInteger('ns_ma')
                ->autoIncrement();
            $table->string('nv_ma', 10);
            $table->unsignedTinyInteger('x_ma');
            $table->unsignedTinyInteger('h_ma');
            $table->unsignedTinyInteger('t_ma');
            $table->string('ns_diaChi', 100);
            $table->timestamp('ns_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ns_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('x_ma')
                ->references('x_ma')
                ->on('xa')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('h_ma')
                ->references('h_ma')
                ->on('huyen')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('t_ma')
                ->references('t_ma')
                ->on('tinh')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('nv_ma')
                ->references('nv_ma')
                ->on('nhanvien')
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
        Schema::dropIfExists('noisinh');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLichsubanthanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichsubanthan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('lsbt_ma')
                ->autoIncrement();
            $table->string('nv_ma', 10);
            $table->text('lsbt_hanhViPhamToi');
            $table->text('lsbt_thamGiaToChucChinhTri');
            $table->timestamp('lsbt_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('lsbt_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'));

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
        Schema::dropIfExists('lichsubanthan');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiVbccTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_vbcc', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('loaiVBCC_ma')->autoIncrement();
            $table->string('loaiVBCC_ten',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_vbcc');
    }
}


/* $table->engine = 'InnoDB';
$table->unsignedTinyInteger('vbcc_ma')->autoIncrement();
//$table->unsignedTinyInteger('nv_ma')->comment('Mã nhân viên # nv_ma ');
$table->string('vbcc_ten',50);
$table->unsignedTinyInteger('loaiVBCC_ma')
$table->string('vbcc_trinhdo',50);
$table->timestamp('vbcc_ngayCap')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cấp # Thời điểm đầu tiên cấp bằng'); */
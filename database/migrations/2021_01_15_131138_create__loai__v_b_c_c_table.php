<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiVBCCTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Loai_VBCC', function (Blueprint $table) {
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
        Schema::dropIfExists('Loai_VBCC');
    }
}

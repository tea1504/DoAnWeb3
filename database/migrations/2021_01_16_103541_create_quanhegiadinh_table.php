<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuanhegiadinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quanhegiadinh', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('qhgd_ma')
                    ->autoIncrement();
            $table->string('nv_ma', 10);
            $table->string('qhgd_ten', 50);
            $table->string('qhgd_moiQuanHe', 50);
            $table->string('qhgd_namSinh', 4);
            $table->string('qhgd_diaChi', 200);
            $table->string('qhgd_ngheNghiep', 100);
            $table->timestamp('qhgd_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('qhgd_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('qhgd_nuocNgoai');
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
        Schema::dropIfExists('quanhegiadinh');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVanbangChungchiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanbang_chungchi', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('vbcc_ma')->autoIncrement();
            $table->string('nv_ma', 10);
            $table->string('vbcc_ten', 100);
            $table->unsignedTinyInteger('lvbcc_ma');
            $table->string('vbcc_trinhDo', 100)->nullable();
            $table->string('vbcc_tuNgay', 7);
            $table->string('vbcc_denNgay', 7);
            $table->string('vbcc_tenTruong', 100);
            $table->string('vbcc_hinhThuc', 100)->nullable();

            $table->timestamp('vbcc_taoMoi')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('vbcc_capNhat')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('lvbcc_ma')
                    ->references('lvbcc_ma')
                    ->on('loai_vbcc')
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
        Schema::dropIfExists('vanbang_chungchi');
    }
}

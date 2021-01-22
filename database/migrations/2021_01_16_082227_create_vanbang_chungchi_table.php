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

            $table->unsignedInteger('vbcc_ma')
                    ->autoIncrement();
            $table->string('nv_ma', 10);
            $table->string('vbcc_ten', 50);
            $table->string('vbcc_trinhDo', 50)->nullable();
            $table->date('vbcc_ngayCap');
            $table->timestamp('vbcc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('vbcc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));

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

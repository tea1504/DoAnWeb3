<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNgachBacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngach_bac', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('nb_ma')->autoIncrement()->comment('mã ngạch_bậc');
            $table->double('nb_heSoLuong',3)->comment('Hệ số lương');
            $table->unsignedTinyInteger('ng_ma');
            $table->unsignedTinyInteger('b_ma');
            $table->timestamp('nb_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('nb_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('ng_ma')->references('ng_ma')->on('ngach')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('b_ma')->references('b_ma')->on('bac')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ngach_bac');
    }
}

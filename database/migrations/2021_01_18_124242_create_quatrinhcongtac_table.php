<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuatrinhcongtacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quatrinhcongtac', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('qtct_ma')->autoIncrement()->comment('mã quá trình công tác');
            $table->string('nv_ma', 10);
            $table->string('qtct_tuNgay', 10);
            $table->string('qtct_denNgay', 10);
            $table->unsignedTinyInteger('cvu_ma');
            $table->unsignedTinyInteger('dv_ma');
            $table->unsignedTinyInteger('nb_ma');
            $table->timestamp('qtct_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('qtct_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nb_ma')->references('nb_ma')->on('ngach_bac')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('cvu_ma')->references('cvu_ma')->on('chucvu')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('dv_ma')->references('dv_ma')->on('donvi')
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
        Schema::dropIfExists('quatrinhcongtac');
    }
}

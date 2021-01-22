<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luong', function (Blueprint $table) { 
            $table->engine = 'InnoDB';
            $table->unsignedInteger('l_ma')->autoIncrement()->comment('mã lương');
            $table->string('nv_ma', 10);
            $table->unsignedTinyInteger('l_tinhTrang')->default('1');
            $table->decimal('l_luongCanBan',13,3);
            $table->unsignedTinyInteger('ng_ma');
            $table->unsignedTinyInteger('b_ma');
            $table->unsignedTinyInteger('pc_ma');
            $table->timestamp('l_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('l_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ng_ma')->references('ng_ma')->on('ngach')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('b_ma')->references('b_ma')->on('bac')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('pc_ma')->references('pc_ma')->on('phucap')
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
        Schema::dropIfExists('luong');
    }
}

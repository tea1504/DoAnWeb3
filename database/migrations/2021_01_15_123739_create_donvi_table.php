<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donvi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('dv_ma')->autoIncrement();
            $table->string('dv_ten', 100);
            $table->unsignedTinyInteger('dvql_ma');
            $table->timestamp('dv_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dv_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('dvql_ma')
                ->references('dvql_ma')
                ->on('donviquanly')
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
        Schema::dropIfExists('donvi');
    }
}

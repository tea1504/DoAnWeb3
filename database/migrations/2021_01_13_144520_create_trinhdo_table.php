<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrinhdoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trinhdo', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('td_ma')->autoIncrement();
            $table->string('td_ten',50);
            $table->timestamp('td_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('td_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trinhdo');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNgachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngach', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('ng_ma')->autoIncrement()->comment('mã ngạch'); 
            $table->string('ng_ten', 50); 
            $table->timestamp('ng_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ng_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ngach');
    }
}

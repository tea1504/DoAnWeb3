<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bac', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('b_ma')->autoIncrement()->comment('mã bậc');
            $table->string('b_ten', 50); 
            $table->timestamp('b_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('b_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bac');
    }
}

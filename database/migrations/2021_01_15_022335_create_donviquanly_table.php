<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonviquanlyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donviquanly', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('dvql_ma')->autoIncrement();
            $table->string('dvql_ten', 100);
            $table->timestamp('dvql_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dvql_capNhat')
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
        Schema::dropIfExists('donviquanly');
    }
}

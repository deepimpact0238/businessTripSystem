<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MstPrefectures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('prefectures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->default(0); // 都道府県番号(value)
            $table->text('name'); // 都道府県名(name)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('prefectures');
    }
}

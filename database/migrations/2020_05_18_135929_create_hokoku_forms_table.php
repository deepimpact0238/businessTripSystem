<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHokokuFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hokoku_forms', function (Blueprint $table) {
            $table->id();
            //部署、名前、行先、期間(FromTo)、目的、精算予定日、備考、交通費(交通機関、区間、金額)、日当、宿泊費、仮払い金
            $table->string('busyo', 20);
            $table->string('name', 20);
            $table->string('ikisaki',20);
            $table->date('From');
            $table->date('To');
            $table->longText('purchase');
            $table->date('seisan');
            $table->longText('bikou');
            $table->string('kotsukikan', 20);
            $table->string('fromKukan', 20);
            $table->string('toKukan', 20);
            $table->integer('kingaku');
            $table->integer('nitto');
            $table->integer('syukuhakuhi');
            $table->integer('kariharai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hokoku_forms');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBerichteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_Berichte',function ( Blueprint $table){


            $table->dropColumn('mitarbeiter_id')->after("id");


        });

        Schema::table('tbl_Berichte',function ( Blueprint $table){


            $table->unsignedBigInteger('mitarbeiter_id')->after("id");
            $table->foreign('mitarbeiter_id','fk_ma_id_berichte')->references('id')->on('tbl_Mitarbeiter')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_Berichte',function (Blueprint $table){
            $table->dropForeign("fk_ma_id_berichte");

        });
    }
}

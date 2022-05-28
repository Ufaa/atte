<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateandattendanceidToIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('intervals', function (Blueprint $table) {
            $table->date('date');  //カラム追加
            $table->date('attendance_id')->nullable();  //カラム追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intervals', function (Blueprint $table) {
            $table->dropColumn('date');  //カラムの削除
            $table->dropColumn('attendance_id');  //カラムの削除
        });
    }
}

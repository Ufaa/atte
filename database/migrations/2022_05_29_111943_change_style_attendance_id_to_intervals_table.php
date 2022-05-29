<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStyleAttendanceIdToIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('intervals', function (Blueprint $table) {
            $table->integer('attendance_id')->change();  //カラム型変更
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
            $table->date('attendance_id')->change();  //カラム型変更の削除
        });
    }
}

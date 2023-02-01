<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAttendanceTable extends Migration
{
    public function up()
    {
        Schema::table('attendances', function (Blueprint $table) {
            #カラム名を変更する
            //$table->renameColumn('name', 'name');

            #カラムをnull許可に変更する
            $table->string('user_id')->unique()->comment('ユーザID')->after('id');

            $table->timestamp('attendance')->comment('出勤時間')->nullable()->after('user_id');

            $table->timestamp('clock_out')->comment('退勤時間')->nullable()->after('attendance');

            $table->string('remarks')->comment('備考')->nullable()->after('clock_out');

        
            #カラムのデータ型を変更する
            //$table->integer('password')->change();

            #date型カラムをpasswordカラムの後ろに追加する
            //$table->date('birth_date')->after('password');

            #noteカラムにindexを貼る
            //$table->index('note')->change();

            #hogeカラムをunique値にしてコメントを入れる
            //$table->string('hoge')->unique()->comment('ほげ')->change();

        });
    }

    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            Schema::dropIfExists('attendances');
        });
    }
}
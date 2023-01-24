<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRoomUsersTable extends Migration
{
    public function up()
    {
        Schema::table('room', function (Blueprint $table) {
            #カラム名を変更する
            $table->id()->comment('会議室_ユーザID')->change();

            $table->unsignedBigInteger('user_id')->comment('ユーザーID(FK)')->after('id');

            $table->unsignedBigInteger('room_id')->comment('会議室ID(FK)')->after('user_id');;
            

           

            $table->dropColumn('created_at');









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
        Schema::table('room_users', function (Blueprint $table) {
            Schema::dropIfExists('room_users');
        });
    }
}

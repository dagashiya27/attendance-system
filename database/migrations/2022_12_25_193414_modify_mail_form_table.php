<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMailFormTable extends Migration
{
    public function up()
    {
        Schema::table('mail_form', function (Blueprint $table) {
            #カラム名を変更する
            $table->id()->comment('メールID')->change();

            $table->unsignedBigInteger('user_id')->comment('送信者ID(FK)')->after('id');

            $table->unsignedBigInteger('send_id')->comment('受信者ID')->after('user_id');

            $table->string('body')->after('send_id');
       

            $table->dropColumn('created_at');

            $table->renameColumn('updated_at', 'send_at')->comment('送信日時')->change();

       


        
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
        Schema::table('mail_form', function (Blueprint $table) {
            Schema::dropIfExists('mail_form');
        });
    }
}

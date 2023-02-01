<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            #カラム名を変更する
            //$table->renameColumn('name', 'name');

            #カラムをnull許可に変更する
            $table->string('r_user_id')->comment('会議室_ユーザ情報ID')->after('id');

            $table->string('user_id')->unique()->comment('ユーザID')->after('r_user_id');

            $table->dateTime('start_time')->comment('出勤時間')->nullable()->after('user_id');

            $table->dateTime('finish_time')->comment('退勤時間')->nullable()->after('start_time');


            $table->Integer('people')->comment('利用人数')->nullable()->after('finish_time');

            $table->string('remarks')->comment('備考')->nullable()->after('people');

            $table->string('created_at')->comment('予約登録日時')->change();

        
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
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

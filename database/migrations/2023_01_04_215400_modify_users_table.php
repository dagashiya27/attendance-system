<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

             #カラム名を変更する
            //$table->renameColumn('name', 'name');

            #カラムをnull許可に変更する
            //$table->string('email')->nullable()->change();

            $table->string('affiliation')->nullable()->after('name');

            $table->string('number')->nullable()->after('affiliation');

            $table->string('address')->nullable()->after('number');


            $table->string('remarks')->nullable()->after('address');

            $table->dropColumn('email_verified_at');

            $table->dropColumn('remember_token');

            $table->tinyInteger('role')->default(0)->after('created_at');

            $table->tinyInteger('del_flg')->default(0)->after('role');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::dropIfExists('users');
        });
    }
};

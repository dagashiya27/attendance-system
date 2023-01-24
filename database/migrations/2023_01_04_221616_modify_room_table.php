<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
  
        Schema::table('room', function (Blueprint $table) {
            #カラム名を変更する
            $table->id()->comment('会議室ID')->change();


            $table->string('name')->unique()->comment('会議室名')->after('id');

            $table->integer('number_users')->comment('利用可能人数')->nullable()->after('name');


            $table->dropColumn('updated_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
            Schema::dropIfExists('room');
        }
    }

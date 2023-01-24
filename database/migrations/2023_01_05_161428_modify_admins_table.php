<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
Schema::table('admins', function (Blueprint $table) {


    $table->string('name')->nullable()->after('id');

    $table->string('email')->unique()->after('name');

    $table->string('number')->nullable()->after('name');

    $table->string('address')->nullable()->after('number');

    $table->string('password')->after('email');


    $table->string('remarks')->nullable()->after('address');

    $table->dropColumn('updated_at');


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
        Schema::table('admins', function (Blueprint $table) {
            Schema::dropIfExists('admins');
        });
        //
    }
};

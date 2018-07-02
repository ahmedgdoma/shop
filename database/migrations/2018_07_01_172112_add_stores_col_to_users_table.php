<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStoresColToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores');
        });
        Illuminate\Support\Facades\DB::table('stores')->insert(
            [
                'area' => 'all'
            ]
        );
        \Illuminate\Support\Facades\DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@shop.com',
                'password' => \Illuminate\Support\Facades\Hash::make('admin'),
                'store_id'=>1
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

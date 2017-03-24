<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');

            //group type
            $table->integer('group_type_single')->default(4000);
            $table->integer('group_type_family')->default(150);

            //
            $table->integer('p_xs')->default(300);
            $table->integer('p_s')->default(800);
            $table->integer('p_m')->default(1040);
            $table->integer('p_l')->default(850);
            $table->integer('p_xl')->default(450);
            $table->integer('p_xxl')->default(160);

            // kids
            $table->integer('kids_110')->default(30);
            $table->integer('kids_130')->default(30);

            // family
            $table->integer('f_xs')->default(80);
            $table->integer('f_s')->default(70);
            $table->integer('f_m')->default(80);
            $table->integer('f_l')->default(50);
            $table->integer('f_xl')->default(50);
            $table->integer('f_xxl')->default(10);

            $table->timestamps();
        });

        $this->init();
    }

    private function init()
    {
        DB::table('stocks')->insert(array(
            "group_type_single" => 4000,
            "group_type_family" => 150,

            "p_xs" => 300,
            "p_s" => 800,
            "p_m" => 1040,
            "p_l" => 850,
            "p_xl" => 450,
            "p_xxl" => 160,

            "kids_110" => 30,
            "kids_130" => 30,

            "f_xs" => 80,
            "f_s" => 70,
            "f_m" => 80,
            "f_l" => 50,
            "f_xl" => 50,
            "f_xxl" => 10,
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stocks');
    }
}

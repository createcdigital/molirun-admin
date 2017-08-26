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
            $table->integer('group_type_single')->default(0);
            $table->integer('group_type_family')->default(0);

            //
            $table->integer('p_xs')->default(0);
            $table->integer('p_s')->default(0);
            $table->integer('p_m')->default(0);
            $table->integer('p_l')->default(0);
            $table->integer('p_xl')->default(0);
            $table->integer('p_xxl')->default(0);

            // kids
            $table->integer('kids_110')->default(0);
            $table->integer('kids_130')->default(0);

            // family
            $table->integer('f_xs')->default(0);
            $table->integer('f_s')->default(0);
            $table->integer('f_m')->default(0);
            $table->integer('f_l')->default(0);
            $table->integer('f_xl')->default(0);
            $table->integer('f_xxl')->default(0);

            $table->timestamps();
        });

        $this->init();
    }

    private function init()
    {
        DB::table('stocks')->insert(array(
            "group_type_single" => 2800,
            "group_type_family" => 350,

            "p_xs" => 230,
            "p_s" => 640,
            "p_m" => 800,
            "p_l" => 650,
            "p_xl" => 350,
            "p_xxl" => 130,

            "kids_110" => 80,
            "kids_130" => 90,

            "f_xs" => 210,
            "f_s" => 180,
            "f_m" => 200,
            "f_l" => 140,
            "f_xl" => 130,
            "f_xxl" => 20,
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

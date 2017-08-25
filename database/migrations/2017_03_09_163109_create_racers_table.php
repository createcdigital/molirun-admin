<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racers', function (Blueprint $table) {
            $table->increments('id');

            //wechat information
            $table->string('openid')->default('');
            $table->string('nickname')->default('');
            $table->text('headimgurl')->default('');
            $table->enum('sex', [0, 1, 2])->default(0); // 用户的性别，值为1时是男性，值为2时是女性，值为0时是未知
            $table->string('city')->default('');
            $table->string('country')->default('');
            $table->string('province')->default('');
            $table->string('subscribe_time')->default('');

            // form
            $table->string('grouptype')->default(''); // 0:5km, 1:10km, 2:family
            $table->string('p1_tag')->default('');

            // p1
            $table->string('p1_name')->default('');
            $table->string('p1_sex')->default('');
            $table->string('p1_birthday')->default('');
            $table->string('p1_teesize')->default('');

            $table->string('p1_card_type')->default('');
            $table->string('p1_card_number')->default('');
            $table->string('p1_phone')->default('');

            $table->string('p1_emergency_name')->default('');
            $table->string('p1_emergency_phone')->default('');

            // p2
            $table->string('p2_name')->default('');
            $table->string('p2_sex')->default('');
            $table->string('p2_birthday')->default('');
            $table->string('p2_teesize')->default('');

            $table->string('p2_card_type')->default('');
            $table->string('p2_card_number')->default('');
            $table->string('p2_phone')->default('');

            $table->string('p2_emergency_name')->default('');
            $table->string('p2_emergency_phone')->default('');

            // kids
            $table->string('kids_name')->default('');
            $table->string('kids_sex')->default('');
            $table->string('kids_birthday')->default('');
            $table->string('kids_teesize')->default('');

            $table->string('kids_card_type')->default('');
            $table->string('kids_card_number')->default('');
            $table->string('kids_guardian_name')->default('');
            $table->string('kids_guardian_phone')->default('');

            $table->string('kids_emergency_name')->default('');
            $table->string('kids_emergency_phone')->default('');

            // package
            $table->string('pakcage_get_way')->default('');
            $table->string('pakcage_get_name')->default('');
            $table->string('pakcage_get_phone')->default('');
            $table->string('pakcage_get_address')->default('');

            // payment
            $table->string('out_trade_no')->unique();
            $table->string('pay_status')->default('');
            $table->string('transaction_id')->default('');
            $table->string('transaction_date')->default('');

            // race result
            $table->string('p1_race_number')->default('');
            $table->string('p2_race_number')->default('');
            $table->string('kids_race_number')->default('');
            $table->string('race_time')->default('');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('racers');
    }
}

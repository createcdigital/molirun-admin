<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->rememberToken();
			$table->timestamps();
		});

		$this->init();
	}

	private function init()
	{
		DB::table('users')->insert(array(
			"name" => "admin",
			"email" => "admin@createcdigital.com",
			"password" => '$2y$10$h.HmflGV8q9MUa8kaidpeuXAmrCTZ2QbkoyHzem6a9Fq1Ra24OnIy',
		));
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

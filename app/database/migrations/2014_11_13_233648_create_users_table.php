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
			$table->increments('user_id');
			$table->integer('sciper')->unsigned()->unique();
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('email', 75)->unique();
			$table->boolean('daily_notice_activated')->default(false);
			$table->boolean('weekly_notice_activated')->default(true);
			$table->smallInteger('application_count')->default(0)->unsigned();
			$table->boolean('is_admin')->default(false);
			
			$table->timestamps();
			$table->softDeletes();
		});
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

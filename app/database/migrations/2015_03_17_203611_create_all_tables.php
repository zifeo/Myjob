<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/* contact_emails */
		Schema::create('contact_emails', function(Blueprint $table)
		{
			$table->string('contact_email', 75);
			$table->string('random_secret', 32);
			$table->primary(['contact_email', 'random_secret']);

			$table->timestamps();
			$table->softDeletes();
		});

		/* categories */
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('category_id');
			$table->string('name_en', 30);
			$table->string('name_fr', 30);
			$table->integer('color');

			$table->timestamps();
			$table->softDeletes();
		});

		/* users */
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

		/* ads */
		Schema::create('ads', function(Blueprint $table)
		{
			$table->increments('ad_id');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('category_id')->on('categories');
			$table->string('random_secret', 32);
			$table->string('url', 50)->unique();
			$table->string('title', 50);
			$table->string('salary', 100)->nullable();
			$table->string('place', 15)->nullable();
			$table->text('description');
			$table->text('skills')->nullable();
			$table->string('duration', 100)->nullable();
			$table->string('languages', 50)->nullable();
			$table->string('contact_first_name', 50);
			$table->string('contact_last_name', 50);
			$table->string('contact_email', 75);
			$table->foreign('contact_email')->references('contact_email')->on('contact_emails');
			$table->string('contact_phone', 20)->nullable();
			$table->date('starts_at');
			$table->date('ends_at')->nullable();
			$table->dateTime('expires_at');
			$table->boolean('is_validated')->default(false);
			$table->dateTime('validated_at')->nullable();

			$table->timestamps();
			$table->softDeletes();
		});

		/* FAQ */
		Schema::create('faq', function(Blueprint $table) {
			$table->integer('position');
			$table->primary('position');
			$table->string('question_fr', 100);
			$table->text('answer_fr');
			$table->string('question_en', 100);
			$table->text('answer_en');

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
		Schema::drop('ads');
		Schema::drop('users');
		Schema::drop('categories');
		Schema::drop('contact_emails');
		Schema::drop('faq');
	}

}

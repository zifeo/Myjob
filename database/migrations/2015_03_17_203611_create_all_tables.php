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
		/* providers */
		Schema::create('providers', function(Blueprint $table) {
			
			$table->increments('provider_id');
			$table->string('contact_email', config('data.ad.contact_email.max'))->unique();
			$table->string('random_secret', 32);

			$table->timestamps();
			$table->softDeletes();
		});

		/* categories */
		Schema::create('categories', function(Blueprint $table) {
			
			$table->increments('category_id');
			$table->string('name_en', 30);
			$table->string('name_fr', 30);
			$table->integer('color');

			$table->timestamps();
			$table->softDeletes();
		});

		/* users */
		Schema::create('users', function(Blueprint $table) {
			
			$table->increments('user_id');
			$table->integer('sciper')->unsigned()->unique();
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('email', 75)->unique();
			$table->boolean('daily_notice_activated')->default(false);
			$table->boolean('weekly_notice_activated')->default(true);
			$table->boolean('admin')->default(false);
			
			$table->timestamps();
			$table->softDeletes();
		});

		/* ads */
		Schema::create('ads', function(Blueprint $table) {
			
			$table->increments('ad_id');
			$table->string('url', config('data.ad.title.max') + 10)->unique();
			$table->string('random_secret', 32);
			
			$table->string('title', config('data.ad.title.max'));
			$table->integer('category_id')->unsigned();
			$table->string('place', config('data.ad.place.max'));
			$table->text('description');

			$table->date('starts_at');
			$table->date('ends_at')->nullable();
			$table->string('duration', config('data.ad.duration.max'));
			$table->string('salary', config('data.ad.salary.max'));
			$table->string('skills', config('data.ad.skills.max'))->nullable();
			$table->string('languages', config('data.ad.languages.max'))->nullable();
			
			$table->string('contact_first_name', config('data.ad.contact_first_name.max'));
			$table->string('contact_last_name', config('data.ad.contact_last_name.max'));
			$table->string('contact_email', config('data.ad.contact_email.max'));
			$table->string('contact_phone', config('data.ad.contact_phone.max'))->nullable();

			$table->dateTime('validated_at')->nullable();
			$table->boolean('activated')->default(true);			
			$table->dateTime('expires_at');

			$table->foreign('category_id')->references('category_id')->on('categories');
			$table->foreign('contact_email')->references('contact_email')->on('providers');
			$table->timestamps();
			$table->softDeletes();
		});

		/* FAQ */
		Schema::create('faq', function(Blueprint $table) {
			
			$table->increments('faq_id');
			$table->integer('position');
			$table->string('question_fr', 100);
			$table->text('answer_fr');
			$table->string('question_en', 100);
			$table->text('answer_en');

			$table->timestamps();
			$table->softDeletes();
		});

		/* sessions */		
		Schema::create('sessions', function(Blueprint $table) {
			
            $table->increments('id');
            $table->text('payload');
            $table->integer('last_activity');
            
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
		Schema::drop('providers');
		Schema::drop('faq');
		Schema::drop('sessions');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {

			$table->increments('publisher_id');
			$table->string('contact_email', config('data.ad.contact_email.max'));
			$table->string('random_secret', 32);

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('categories', function (Blueprint $table) {

			$table->increments('category_id');
			$table->string('name_en', 30);
			$table->string('name_fr', 30);
			$table->integer('color');

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('users', function (Blueprint $table) {

			$table->increments('user_id');
			$table->integer('sciper')->unsigned()->unique();
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('email', 75)->unique();
			$table->boolean('notifications_instant')->default(false);
			$table->boolean('notifications_day')->default(false);
			$table->boolean('notifications_week')->default(true);
			$table->boolean('admin')->default(false);
			$table->boolean('is_student');

			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('ads', function (Blueprint $table) {

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

			$table->boolean('validated')->nullable();
			$table->dateTime('validated_at')->nullable();
			$table->dateTime('expires_at');

			$table->foreign('category_id')->references('category_id')->on('categories');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('faq', function (Blueprint $table) {

			$table->increments('faq_id');
			$table->integer('position');
			$table->text('question_fr');
			$table->text('answer_fr');
			$table->text('question_en');
			$table->text('answer_en');

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->text('payload');
            $table->integer('last_activity');
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
		Schema::drop('publishers');
		Schema::drop('faq');
		Schema::drop('sessions');

    }
}

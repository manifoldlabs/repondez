<?php

class Initial_Migration {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// users table
		Schema::create('users', function($table) {
	    $table->increments('id');

	    $table->string('email', 320);
	    $table->string('password', 256);
	    $table->integer('role');

	    // created_at | updated_at DATETIME
	    $table->timestamps();  
		});

		// events table
		Schema::create('events', function($table) {
	    $table->increments('id');

	    $table->string('name',256);

	    $table->integer('user_id');
	    $table->date('date');

	    $table->integer('access_code');
	    $table->string('access_number',12);

	    // created_at | updated_at DATETIME
	    $table->timestamps();  
		});

		// invitations table
		Schema::create('invitations', function($table) {
	    $table->increments('id');

	    $table->string('name',256);

	    $table->string('status',16);
	    $table->string('rsvp',5);

	    $table->integer('count_expected');
	    $table->integer('count');

	    $table->integer('event_id');
	    $table->integer('user_id');

	    $table->integer('access_code');
	    $table->string('access_number',10);

	    // created_at | updated_at DATETIME
	    $table->timestamps();  
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		// drop users
		Schema::drop('users');
		Schema::drop('events');
		Schema::drop('invitations');
	}

}
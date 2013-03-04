<?php

class Numbers_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// numbers table
		Schema::create('numbers', function($table) {
	    $table->increments('id');

	    $table->string('number', 12);
	    $table->string('sid', 256);
	    $table->string('state', 2);
	    $table->integer('user_id');
	    $table->integer('invitation_id');
	    $table->integer('event_id');

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
		Schmea::drop('numbers');
	}

}
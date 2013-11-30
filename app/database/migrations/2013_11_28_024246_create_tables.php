<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('authors', function(Blueprint $table)
		{
			$table->increments('id');
    		$table->timestamps();
    		$table->string('firstname');
    		$table->string('lastname');
		});

		Schema::create('books', function(Blueprint $table)
		{
    		$table->increments('id');
    		$table->timestamps();
    		$table->string('title');
    		$table->string('description');
    		$table-> date ('date_published');
    		$table->string('ISBN');
    		$table->integer('author_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('authors', function(Blueprint $table){
			Schema::drop('authors');
		});
		Schema::table('books', function(Blueprint $table)
		{
			Schema::drop('books');
		});
	}

}
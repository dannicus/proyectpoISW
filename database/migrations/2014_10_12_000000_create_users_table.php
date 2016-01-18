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
			$table->string('nombre',15);
			$table->string('apellidos',15);
			$table->string('rut',12)->unique();
			$table->string('email',20)->unique();
			$table->string('password', 60);
			$table->string('tipo');
			$table->rememberToken();
			$table->timestamps();
			$table->primaryKey('rut');
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

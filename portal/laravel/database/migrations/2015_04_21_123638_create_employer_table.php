<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Employer', function(Blueprint $table)
		{

            $table->increments('id');
            $table->string('company_name');
            $table->string('location');
            $table->string('sub_location');
            $table->string('email')->unique();
            $table->integer('ref_no');
            $table->text('about');
            $table->integer('contact');
            $table->string('usr_name');
            $table->string('password', 60);
            $table->string('industry_type');
            $table->text('address');
            $table->string('contact_person_name');
            $table->string('logo_path');
            $table->rememberToken();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Employer');
	}

}

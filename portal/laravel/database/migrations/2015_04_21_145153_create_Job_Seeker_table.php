<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSeekerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Job_Seeker', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('alternate_email');
            $table->string('password');
            $table->string('mobile_no');
            $table->string('current_city');
            $table->string('high_qualification');
            $table->timestamp('passout_year');
            $table->string('marks');
            $table->string('institute_id');
            $table->string('university_id');
            $table->string('mime',255);
            $table->float('experience');
            $table->string('skill_1');
            $table->string('skill_2');
            $table->string('skill_3');
            $table->string('skill_4');
            $table->string('skill_5');
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
		Schema::drop('Job_Seeker');
	}

}

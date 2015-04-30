<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apply_jobs', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('job_id')->unsigned();
            $table->integer('employer_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamp('time_when_applied');

            //foreign key relation :

            $table->foreign('job_id')
                ->references('id')->on('job');
            $table->foreign('employer_id')
                ->references('id')->on('users');
            $table->foreign('user_id')
                ->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('apply_jobs');
	}

}

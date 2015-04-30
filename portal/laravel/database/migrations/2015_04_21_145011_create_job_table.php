<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Job', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('title');
            $table->integer('Employer_id')->unsigned();
            $table->string('Job_cat');
            $table->float('min_sal');
            $table->float('min_experience_required');
            $table->timestamp('closing_date');
			$table->timestamps();

            //foreign key relation :

            $table->foreign('Employer_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Job');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalkinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('walkins', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->integer('Employer_id')->unsigned();
            $table->string('Job_cat');
            $table->text('address');
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
		Schema::drop('walkins');
	}

}

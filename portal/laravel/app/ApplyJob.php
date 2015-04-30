<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model {
    protected $table='apply_jobs';
    public $timestamps=false;

    protected $fillable = ['job_id', 'employer_id', 'user_id', 'time_when_applied'];
	//

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_Seeker extends Model {
    protected $table='job_seeker';

    protected $fillable = ['fname', 'lname', 'email', 'alternate_email', 'password', 'mobile_no', 'current_city', 'high_qualification', 'passout_year', 'marks', 'institute_id', 'university_id', 'experience', 'skill_1', 'created_at', 'updated_at'];

	//

}

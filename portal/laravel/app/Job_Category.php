<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_Category extends Model {
    protected $table='job_category';

    protected $fillable = ['cat_name', 'created_at', 'updated_at'];

	//

}

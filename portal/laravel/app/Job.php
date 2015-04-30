<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Job extends Model {
    protected $table='job';

    protected $fillable = ['title', 'Employer_id', 'Job_cat', 'min_sal', 'min_experience_required', 'closing_date', 'created_at', 'updated_at' ];
    public function setCreateAttribute($date)
    {
        $this->attributes['created_at']=Carbon::createFromFormat('d-m-y',$date);
        $this->attributes['closing_date']=Carbon::createFromFormat('d-m-y',$date);
        $this->attributes['updated_at']=Carbon::createFromFormat('d-m-y',$date);
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }

	//

}

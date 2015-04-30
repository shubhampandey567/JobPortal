<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model {

    protected $fillable = ['title', 'Employer_id', 'Job_cat', 'address', 'closing_date', 'created_at', 'updated_at' ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

}

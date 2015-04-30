<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Preparation extends Model {

    protected $fillable = ['title', 'Employer_id', 'Job_cat','link', 'created_at', 'updated_at' ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

}

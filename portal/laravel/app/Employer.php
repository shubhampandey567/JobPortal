<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model {
    protected $table='employer';
    protected $fillable = ['company_name', 'location', 'sub_location', 'email', 'ref_no', 'about', 'contact', 'usr_name', 'password', 'industry_type', 'address', 'contact_person_name', 'created_at', 'updated_at'];

    public function Job()
    {
        return $this->hasMany('App\Job');
    }

}

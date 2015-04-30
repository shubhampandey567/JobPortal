<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable =
        [
            'authority' ,
             'contact' ,
             'location' ,
             'qualification',
             'university'  ,
            'marks'  ,
             'skill'  ,
             'logo'  ,
            'name',
            'email',
            'password'
        ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token','authority'];
    public function Job()
    {
        return $this->hasMany('App\Job');
    }
    public function Training()
    {
        return $this->hasMany('App/Training');
    }
    public function Walkins()
    {
        return $this->hasMany('App/Walkins');
    }
    public function Consultancy()
    {
        return $this->hasMany('App/Consultancies');
    }

}

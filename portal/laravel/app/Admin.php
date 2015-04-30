<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {
    protected $table='admin';

    protected $fillable = ['email', 'password', 'admin_level', 'created_at', 'updated_at'];

	//

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model {
    protected $table='branch';

    protected $fillable = ['qualification_id', 'branch', 'created_at', 'updated_at'];

	//

}

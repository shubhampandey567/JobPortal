<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model {
    protected $table='qualification';

    protected $fillable = ['course', 'created_at', 'updated_at'];

	//

}

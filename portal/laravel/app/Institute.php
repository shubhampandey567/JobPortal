<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model {
    protected $table='institute';

    protected $fillable = ['university_id', 'name', 'created_at', 'updated_at'];

	//

}

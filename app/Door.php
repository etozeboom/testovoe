<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    protected $fillable = [
        'name'
    ];
    public function roles() {
		return $this->belongsToMany('App\Role','permission_role','doors_id','role_id');
	}
}

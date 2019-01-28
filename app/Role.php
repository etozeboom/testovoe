<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users() {
		return $this->belongsToMany('App\User','role_user');
    }
    
    public function doors() {
		return $this->belongsToMany('App\Door','permission_role','role_id','doors_id');
	}
}

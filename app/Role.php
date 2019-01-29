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
  
  public function hasPermission($name, $require = false)
    {
        if (is_array($name)) {
            foreach ($name as $permissionName) {
                $hasPermission = $this->hasPermission($permissionName);

                if ($hasPermission && !$require) {
                    return true;
                } elseif (!$hasPermission && $require) {
                    return false;
                }
            }
            return $require;
        } else {
            foreach ($this->doors as $permission) {
                if ($permission->name == $name) {
                    return true;
                }
            }
        }

        return false;
    }
    
    public function savePermissions($inputPermissions) {
		
		if(!empty($inputPermissions)) {
			$this->doors()->sync($inputPermissions);
		}
		else {
			$this->doors()->detach();
		}
		
		return TRUE;
  }
  
}

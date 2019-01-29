<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Door;
use App\Role;

class PermissionsController extends Controller
{
    public function execute(Request $request) {

        $doors = Door::all();
        $roles = Role::all();

        if($request->isMethod('post')) {


            $data = $request->except('_token');          
            
            foreach($roles as $value) {
                if(isset($data[$value->id])) {
                    $value->savePermissions($data[$value->id]);
                }
                
                else {
                    $value->savePermissions([]);
                }
            }
            
            //return ['status' => 'Права обновлены'];

            $request->session()->flash('status', 'permissions updates');
			return view('admin.permissions',['doors'=>$doors, 'roles'=>$roles, 'request'=> $request, 'title' => 'edit permissions']);			
			
		}       

        return view('admin.permissions',['doors'=>$doors, 'roles'=>$roles, 'request'=> $request, 'title' => 'edit permissions']);
        
    }

}

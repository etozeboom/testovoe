<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Door;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function execute(Request $request) {
        
        $id = Auth::id();

        /*$roles = User::find($id)->roles; 

        foreach($roles as $role) {
            //echo $role->id;
        }
        $doors_perm_id = Role::find(2)->doors;
        foreach($doors_perm_id as $door) 
                    {                        //dump($door);
                       echo $door->id ; 
                       
                    }*/

        $doors = Door::all();

        if($request->isMethod('post')) {
			
			
			
            $data = $request->all();
            //dump($request->user()->first()->password);
            //dump($data['password']);
            if (Hash::check($data['password'], Auth::user()->password)) 
            {
                $door_id = $data['door_id'];
                
                
                $id = Auth::id();
                //$id_role = User::find($id)->roles()->first()->id; 
                $roles = User::find($id)->roles; 

                foreach($roles as $role) 
                {
                    //dump($role);
                    $doors_perm_id = Role::find($role->id)->doors;

            
                    foreach($doors_perm_id as $door) 
                    {
                        //dump($door);
                        if($door->id == $door_id)
                        {
                            return view('site.index',['doors'=>$doors, 'request'=> $request, 'doorId' => $door_id, 'status' => 'доступ есть']);
                        }
                    
                    }
                }
                return view('site.index',['doors'=>$doors, 'request'=> $request, 'doorId' => $door_id, 'status' => 'доступа нет']);
            }
               
            return view('site.index',['doors'=>$doors, 'request'=> $request, 'doorId' => $data['door_id'] , 'status' => 'неверный пароль']);
			  
						
			
		}



        /*DB::insert('insert into permission_role (role_id, doors_id) values (?, ?)', [2, 1]);
        DB::insert('insert into permission_role (role_id, doors_id) values (?, ?)', [3, 3]);
        DB::insert('insert into permission_role (role_id, doors_id) values (?, ?)', [3, 1]);
        DB::update('update role_user set user_id = ? where id = ?', [2, 2]);
        DB::update('update role_user set user_id = ? where id = ?', [3, 3]);
        DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [4, 3]);
        DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [4, 2]);
        DB::update('update permission_role set doors_id = ? where id = ?', [2, 5]);
        DB::update('update permission_role set doors_id = ? where id = ?', [3, 6]);*/
        

        return view('site.index',['doors'=>$doors, 'request'=> $request]);
        
	}
}

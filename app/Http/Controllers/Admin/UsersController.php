<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function execute(Request $request) 
    {
        /*if (Gate::denies('view_admin')) {
            abort(403);
        }	*/

        $users = User::all();
        
        return view('admin.users',['title' => 'users', 'users' => $users]);
    }

    public function add(Request $request) {
    	
        if($request->isMethod('post')) 
        {
            
            $user = new user();

            $data = $request->all();

            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users|string|max:255',
                'password' => 'required|string|min:6|confirmed',
            ]);
            $user = $user->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            //dump($request);
            //dump($data);
           //dump($data['role_id']);
            if($user) {
                $user->roles()->attach($data['role_id']);
            }

            
            
            $request->session()->flash('status', 'user added');
            $users = User::all();
            return view('admin.users',['title' => 'users', 'users' => $users]);
        }
    	
        if(view()->exists('admin.users_add')) 
        {
            $roles = Role::all();

            $roles =  $roles->reduce(function ($returnRoles, $role) {
                $returnRoles[$role->id] = $role->name;
                return $returnRoles;
            }, []);
			return view('admin.users_add',['roles'=>$roles, 'title' => 'new user']);	
		}
		abort(404);
		
    }
    
    public function edit(user $user,Request $request,UserRequest $userRequest) 
    {
		
		
		/*$user = user::find($id);*/
		
		if($request->isMethod('delete')) {
            //dd($user);
            $user->roles()->detach();
			$user->delete();
			$request->session()->flash('status', 'user deleted');
            $users = User::all();
            return view('admin.users',['title' => 'users', 'users' => $users]);
		}
		
		if($request->isMethod('post')) {

			$data = $request->all();

            if(isset($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            }
            else
            {
                $data = $request->except(['_token','password']);
            }

            $user->fill($data)->update();

            $user->roles()->sync($data['role_id']);
            
            $request->session()->flash('status', 'user update');
            $users = User::all();
            return view('admin.users',['title' => 'users', 'users' => $users]);
			
		}

		$old = $user->toArray();
		if(view()->exists('admin.users_add')) {
            $roles = Role::all();

            $roles =  $roles->reduce(function ($returnRoles, $role) {
                $returnRoles[$role->id] = $role->name;
                return $returnRoles;
            }, []);

            $rolesId =  $user->roles->pluck('id');
            //dump($user->roles);
            $rolesId=$rolesId->all();
            //dump($rolesId);
			return view('admin.users_add',['roles'=>$roles, 'title' => 'new user', 'data' => $old,'user'=>$user, 'rolesId' => $rolesId]);		
			
		}
		
    }
    
    
}

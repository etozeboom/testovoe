<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Door;
use App\Role;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function execute(Request $request) {
        
        echo User::find(1)->roles()->first()->name; 
        $doors = Door::all();

        if($request->isMethod('post')) {
			
			
			
            $data = $request->all();
            //dump($request->user()->first()->password);
            //dump($data['password']);
			if (Hash::check($data['password'], $request->user()->first()->password)) {
               $door_id = $data['door_id'];
                return view('site.index',['doors'=>$doors, 'request'=> $request, 'doorId' => $door_id, 'status' => ' sd']);
            }
               
            return view('site.index',['doors'=>$doors, 'request'=> $request, 'doorId' => $data['door_id'] , 'status' => 'неверный пароль']);
			  
			/*if($result) {
				//return redirect()->route('index')->with('status', 'Email is send');
            }*/
			
			
		}





        
        return view('site.index',['doors'=>$doors, 'request'=> $request]);
        
	}
}

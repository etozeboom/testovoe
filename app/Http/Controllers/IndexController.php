<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Door;
use App\Role;

class IndexController extends Controller
{
    public function execute(Request $request) {
        
        echo User::find(1)->roles()->first()->name; 

        if($request->isMethod('post')) {
			$messages = [
			
			'required' => "Поле :attribute обязательно к заполнению",
			'email' => "Поле :attribute должно соответствовать email адресу"
			
			];
			
			$this->validate($request,[
			
			'name' => 'required|max:255',
			'email' => 'required|email',
			'text' => 'required'	
					
			], $messages);
			
			
			$data = $request->all();
			
			
			
			if($result) {
				return redirect()->route('home')->with('status', 'Email is send');
			}
			
			
		}





        $doors = Door::all();
        return view('site.index',['doors'=>$doors, 'request'=> $request]);
        
	}
}

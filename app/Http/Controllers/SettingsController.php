<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function __construct() {
		
		
    }
    
    public function execute(Request $request) 
    {
        if(!Auth::check()) {
			abort(403);
		}
        if($request->isMethod('post')) 
        {
            $data = $request->all();
            if (Hash::check($data['password'], Auth::user()->password)) 
            {





            }
            
            return view('site.settings',['status' => 'неверный пароль']);
        }




        return view('site.settings');
    }

    public function changePassword()
    {
        $this->validate(request(), [
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        request()->user()->fill([
            'password' => Hash::make(request()->input('new_password'))
        ])->save();
        request()->session()->flash('success', 'Password changed!');

        return redirect()->route('password.change');
    }
}

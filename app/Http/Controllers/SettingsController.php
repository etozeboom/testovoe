<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class SettingsController extends Controller
{
    public function __construct() {
		
		
    }
    public $messages;
    public function execute(Request $request) 
    {
        
        if(!Auth::check()) {
			abort(403);
        }
        //dump($value = $request->session()->get('success'));
        
        if($request->isMethod('post')) 
        {
            $data = $request->all();
            if (Hash::check($data['password'], Auth::user()->password)) 
            {
                //dump(request()->user()->name);
                //dump($data['name']);
                if($data['name']!=$roles = request()->user()->name )
                {
                    $this->changeName();
                }
                if($data['email']!=$roles = request()->user()->email )
                {
                    $this->changeEmail();
                }
               
                if($data['newpassword'])
                {
                    $this->changePassword();
                }

                //dump($this->messages);
                return view('site.settings',['request'=> $request, 'messages' => $this->messages]);
            }

            return view('site.settings',['request'=> $request,'status' => 'неверный пароль']);
        }




        return view('site.settings');
    }

    public function changePassword()
    {
        $this->validate(request(), [
            'newpassword' => 'required|string|min:6|confirmed',
        ]);

        request()->user()->fill([
            'password' => Hash::make(request()->input('newpassword'))
        ])->save();
        //request()->session()->flash('success', 'Password changed!');
        $this->messages [] = 'Password changed | ';
        
    }
    public function changeName()
    { 
        $this->validate(request(), [
            'name' => 'required|string|min:1',
        ]);
       
        request()->user()->fill([
            'name' => request()->input('name')
        ])->save();
        $this->messages [] = 'Name changed | ';
    }
    public function changeEmail()
    { 
        $this->validate(request(), [
            'email' => 'required|email|unique:users|string|max:255',
        ]);
       
        request()->user()->fill([
            'email' => request()->input('email')
        ])->save();
        $this->messages [] = 'email changed | ';
    }
}

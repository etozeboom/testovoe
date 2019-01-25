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

        $doors = Door::all();
        return view('site.index',['doors'=>$doors]);
        
	}
}

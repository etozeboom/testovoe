<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Door;

class DoorsController extends Controller
{
    public function execute(Request $request) 
    {
        /*if (Gate::denies('view_admin')) {
            abort(403);
        }	*/

        $doors = Door::all();

		
        return view('admin.doors',['title' => 'doors', 'doors' => $doors]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class IndexController extends Controller
{
    
    public function index(Request $request) 
    {
      /*  if (Gate::denies('view_admin')) {
            abort(403);
        }	*/

        $data = ['title' => 'Панель администратора'];
		
        return view('admin.index',$data);
    }
}

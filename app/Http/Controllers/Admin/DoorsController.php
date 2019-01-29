<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Door;
use Validator;

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

    public function add(Request $request) {
    	
    	if($request->isMethod('post')) {
            $input = $request->except('_token');
            
			$massages = [
				'required'=>'Поле :attribute обязательно к заполнению'
            ];
            
			$validator = Validator::make($input,[
				'name' => 'required|max:255'			
            ], $massages);
            
			if($validator->fails()) {
				return redirect()->route('doorsAdd')->withErrors($validator)->withInput();
			}
					
			$door = new Door();
			$door->fill($input);
			if($door->save()) {
				return redirect('admin')->with('status','door added');
			}
			
		}
    	
        if(view()->exists('admin.doors_add')) 
        {
			$data = ['title' => 'new door'];
			return view('admin.doors_add',$data);	
		}
		abort(404);
		
    }
    
    public function edit(Door $door,Request $request) {
		
		
		/*$door = door::find($id);*/
		
		if($request->isMethod('delete')) {
			$door->delete();
			return redirect('admin')->with('status','door deleted');
		}
		
		if($request->isMethod('post')) {
			
			$input = $request->except('_token');
			
			$validator = Validator::make($input,[
				'name'=>'required|max:255'			
			]);
			
			if($validator->fails()) {
				return redirect()
						->route('doorsEdit',['door'=>$input['id']])
						->withErrors($validator);
			}
				
			$door->fill($input);
			
			if($door->update()) {
				return redirect('admin')->with('status','door updated');
			}
			
		}

		$old = $door->toArray();
		if(view()->exists('admin.doors_edit')) {
			$data = [
					'title' => 'edit door - '.$old['name'],
					'data' => $old
					];
			return view('admin.doors_edit',$data);		
			
		}
		
	}
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
    
	    $validator->sometimes('password', 'required|min:6|confirmed', function($input)
	    {
			//dd($this->route()->getName());
			if(!empty($input->password) || ((empty($input->password) && $this->route()->getName() !== 'usersUpdate'))) {
                //dd($input);
                return TRUE;
			}
			
			return FALSE;
	    });

	    return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        $id = (isset($this->route()->parameter('user')->id)) ? $this->route()->parameter('user')->id : '';
		//dd($id, $this->route()->parameter('user'));
		return [
             'name' => 'required|max:255',
             'role_id' => 'required',
             //'email' => ['required|email|max:255', Rule::unique('users')->ignore($id),],
             'email' => 'required|email|max:255|unique:users,email,'.$id
        ];
    }
}

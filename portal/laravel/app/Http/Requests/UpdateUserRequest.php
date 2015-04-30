<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'authority' => 'required|min:3|max:255',
            'name' => 'required|max:255|min:3',
            'password' => 'required|confirmed|min:6',
            'contact' => 'required|numeric|min:1000000000',
            'location' => 'required|max:255|min:3',
            'qualification' => 'required|max:255|min:2',
            'university' => 'required|max:255|min:2',
            'marks' => 'required|min:0|max:100',
            'skill' => 'required|min:3|max:255'
		];
	}

}

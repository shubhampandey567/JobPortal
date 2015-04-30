<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateJobRequest extends Request {

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
			'title'=>'required|min:3',

            'created_at'=>'required|date',
            //'updated_at'=>'required|date',
            'closing_date'=>'required|date',
            'Job_cat'=>'required',
            'min_sal'=>'required|numeric|min:1000',
            'min_experience_required'=>'required|numeric|min:0'

		];
	}

}

<?php

namespace SIS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportarPersonaRequest extends FormRequest
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

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
		
		//'file' => 'required|mimes:xls',
		'file' => 'required',
		//'file' => 'required|mimes:xls,xlsx',

		//'file' => 'required|mimes:application/csv,application/excel,application/vnd.ms-excel, application/vnd.msexcel',



		];
	}
}

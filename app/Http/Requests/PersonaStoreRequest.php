<?php

namespace SIS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaStoreRequest extends FormRequest
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
			'nombre' => 'required',
			'apellido' => 'required',
			'telefono' => 'required|min:8',
						//'fecha' => 'required|date|date_format:Y-m-d',
												'fecha' => 'required',


		//'file' => 'required|mimes:pdf',
				'file' => 'required|mimes:pdf,doc,docx',
						//		'file' => 'required|mimes:pdf,doc,docx,odt',



		];
	}
}

<?php

namespace SIS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaUpdateRequest extends FormRequest
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
						//'file' => 'mimes:pdf',
						'fecha' => 'required',


						'file' => 'mimes:pdf|unique:personas,file',
						//'file' => 'mimes:pdf|unique:personas,file,:id',
						//'file' => 'mimes:pdf|unique:personas,ruta',
						//'file' => 'mimes:pdf|exists:personas,file',


		];
	}
}

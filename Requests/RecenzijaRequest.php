<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecenzijaRequest extends FormRequest
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
            'tbNaziv' => 'required|min:3|max:40',
            'tbAutor' => 'required|min:3|max:40',
            'ddlKategorija' => 'not_in:0',
            'taKratakOpis' => 'required|max:500',
            'taTekst' => 'required|min:100',
            'fSlika' => 'required|mimes:jpg,jpeg,png',

        ];
    }
    public function messages()
    {
        return [
            'required' => 'Polje :attribute je obavezno',
            'mimes' => 'Dozvoljeni formati :values formati',
            'not_in' => 'Mora biti izabrana kategorija'
        ];
    }
}

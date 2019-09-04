<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KorisnikRequest extends FormRequest
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
            'tbKorisnickoIme' => 'required|max:50',
            'tbEmail' => 'required|email',
            'tbLozinka' => 'required|min:10',
            'tbLozinkaProvera' => 'required_with:tbLozinka|same:tbLozinka|min:10'

        ];
    }

    public function messages()
    {
        return [
            'required' => 'Polje :attribute je obavezno.'
        ];
    }
}

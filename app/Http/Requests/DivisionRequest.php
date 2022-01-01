<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DivisionRequest extends FormRequest
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
            "name"           => "required|string|max:64|" . Rule::unique("divisions", "name")->ignore($this->league),
            "initials"       => "required|string|max:5|" . Rule::unique("divisions", "initials")->ignore($this->league),
            "nrparticipants" => "nullable|integer",
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "name.required"     => "Este campo é obrigatório.",
            "name.unique"       => "Esse nome já está em uso.",
            "initials.required" => "Este campo é obrigatório.",
            "initials.unique"   => "Essa sigla já está em uso.",
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            "league_id"   => "required|string",
            "division_id" => "required|string",
            "name"        => [
                "required",
                "string",
                "max:64",
                Rule::unique("teams", "name")->ignore($this->team)
            ],
            "initials"    => [
                "required",
                "string",
                "max:5",
                Rule::unique("teams", "initials")->ignore($this->team)
            ],
            "image"       => "nullable|file|mimes:jpeg,png,jpg|max:2048",
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
            "league_id.required"   => "Selecione uma liga.",
            "division_id.required" => "Selecione uma divisão.",
            "name.required"        => "Este campo é obrigatório.",
            "name.unique"          => "Esse nome já está em uso.",
            "initials.required"    => "Este campo é obrigatório.",
            "initials.unique"      => "Essa sigla já está em uso.",
        ];
    }
}

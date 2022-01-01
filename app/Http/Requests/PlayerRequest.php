<?php

namespace App\Http\Requests;

use App\Models\Attribute;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            //player
            "team_id"        => "nullable|integer",
            "name"           => "required|string",
            "lastname"       => "required|string",
            "nickname"       => "required|" . Rule::unique("players", "nickname")->ignore($this->player),
            "country_id"     => "nullable|integer",
            "birthday"       => "required|string",
            "sex"            => "nullable|string",
            "mentor"         => "nullable|string",
            "user_id"        => "nullable",

            //attributes
            "role"           => "required|" . Rule::in(Attribute::$roles),
            "secondary_role" => "required|different:role|" . Rule::in(Attribute::$roles),
            "force"          => "required|integer",
            "energy"         => "nullable|integer",
            "salary"         => "nullable|numeric",
            "pass"           => "nullable|numeric",
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
            "name.required"            => "Este campo é obrigatório.",
            "lastname.required"        => "Este campo é obrigatório.",
            "nickname.required"        => "Este campo é obrigatório.",
            "nickname.unique"          => "Esse apelido já está em uso.",
            "birthday.required"        => "Este campo é obrigatório.",
            "role.required"            => "Este campo é obrigatório.",
            "secondary_role.required"  => "Este campo é obrigatório.",
            "secondary_role.different" => "Posição secundária não podem ser igual a primária",
            "force.required"           => "Este campo é obrigatório.",
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'kotukikan' => 'string|max:255',
            'kukan_from' => 'string|max:255',
            'kukan_to' => 'string|max:255',
            'kukan_money' => 'string|max:255',
        ];
    }
}

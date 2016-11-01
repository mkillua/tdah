<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClassQuestionGet extends Request
{

    private $rules =
        [
            'questionId' => 'required|numeric',

        ];

   

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
        return $this->rules;

    }

    public function response(array $errors)
    {
        return response()->json(['msg'=>$errors],400);
    }
}

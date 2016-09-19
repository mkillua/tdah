<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClassQuestionPost extends Request
{

private $rules =
    [
        'question' => 'required|max:255',
        'classId' => 'required|numeric',
        'correct_response' => 'required',
    ];

private $msg =
[
'question.required' => 'o campo da questão é obrigatório',
'classId.required' => 'o id da aula é obrigatório',
'correct_response.required' => 'a resposta da questão é obrigatória',
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

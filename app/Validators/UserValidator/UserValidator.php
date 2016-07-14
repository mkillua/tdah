<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserValidator
 *
 * @author idealinvest
 */

namespace idealinvest\Validators\UserValidator;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserValidator extends \Validator
{

    public function validateNomecompleto($attribute, $name, $parameters = [])
    {
        $name = str_replace("'", "", $name);
        $er = '/^([A-Za-zÁ-ú]{2,})\s([A-Za-zÁ-ú\s]{2,})$/';
        $preg = preg_match($er, $name);
        
        if (!$preg) {

            return false;
        }
        return true;
    }

    public function validateSenhasIguais($attribute, $password, $parameters = [])
    {

        if ($password == $password['passwordconfirm']) {
            return true;
        }

        return false;
    }
    public function validateFieldsInsert($input)
    {


        $rules = [
            'name' => 'nome_completo|min:3|max:150',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'passwordconfirm '=> 'required|same:password',
            'dt_nasc' => 'required|date',
            'sexo' => 'required',
            'telefone' => 'required|min:10|max:10',
            'tipo_user' => 'required',
            
        ];

        $parameters = [
            'nome_completo' => 'digite um nome valido',
            'same'=>'as senhas não são iguais',
            'email'=>'email invalido',
            'dt_nasc' => 'data de nascimento invalida',
            'sexo' => 'informe um sexo valido',
            'telefone' => 'telefone invalido',
            'tipo_user' => 'informe um tipo de usuario'
        ];
        return $validator = \Validator::make($input, $rules, $parameters);
    }
}

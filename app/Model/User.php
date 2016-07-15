<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Message;
use Mockery\CountValidator\Exception;
use MongoDB\Driver\Exception\ExecutionTimeoutException;


class User extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dt_nasc', 'sobrenome',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Método responsavel por trazer usuario autenticado
     * @autor Mauricio Rodrigues
     * @param $email
     * @param $password
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAllUsers($email, $password)
    {
        return User::where(
            'email', $email)
            ->where(
                'password', $password
            );
    }

    /**
     * Método responsavel por registrar usuarios
     * @autor Mauricio Rodrigues
     * @param array (name,email,password)
     * @return boolean
     */

    public function insertUser($data)
    {
        try {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = sha1($data['password']);
            $user->save();
            return true;
        } catch (\Exception $e) {
           return false;
        }
    }

    /**
     * Método responsavel por verificar se email já está cadastrado
     * @autor Mauricio Rodrigues
     * @param String Email
     * @return object
     */
    public function getUsedEmail($data)
    {
        return User::where('email',$data);
    }
}

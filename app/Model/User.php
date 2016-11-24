<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function newUser($data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->role_id = $data['role_id'];
        return $user->save();
    }




    /**
     * @param array $data
     * @return mixed
     */
    public function getUser($data)
    {
        return User::where('email', $data['email']);
    }

        public function role()
        {
            return $this->hasOne('App\Role', 'id', 'role_id');
        }

        public function hasRole($roles)
        {
            $this->have_role = $this->getUserRole();
            // Check if the user is a root account
            if ($this->have_role->name == 'Root') {
                return true;
            }
            if (is_array($roles)) {
                foreach ($roles as $need_role) {
                    if ($this->checkIfUserHasRole($need_role)) {
                        return true;
                    }
                }
            } else {
                return $this->checkIfUserHasRole($roles);
            }
            return false;
        }

        private function getUserRole()
        {
            return $this->role()->getResults();
        }

        private function checkIfUserHasRole($need_role)
        {
            return (strtolower($need_role) == strtolower($this->have_role->name)) ? true : false;

        }
    }

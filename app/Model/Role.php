<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'role';

    public function users()
    {
        return $this->hasMany('App\Model\User', 'role_id', 'id');
    }

}

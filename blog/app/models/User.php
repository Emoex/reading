<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table='user';
    public function Userinfo()
   	{
   		return $this->hasOne('App\Models\Userinfo','uid');
   	}
}

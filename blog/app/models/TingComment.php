<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TingComment extends Model
{
    protected $table = 'ting_comment';
    
    public function User()
    {
    	return $this->belongsTo('App\models\User','uid');
    }
}

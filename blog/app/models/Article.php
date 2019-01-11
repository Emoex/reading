<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    public function ArticleCate()
    {
    	return $this->belongsTo('App\models\ArticleCate','cid');
    }

    public function User()
    {
    	return $this->belongsTo('App\models\User','uid');
    }
}

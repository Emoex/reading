<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    protected $table = 'article_comment';

    public function User()
    {
    	return $this->belongsTo('App\models\User','uid');
    }
}

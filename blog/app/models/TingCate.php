<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TingCate extends Model
{
    protected $table = 'ting_cate';

    public function TingCate()
    {
        return $this->belongsTo('App\Models\TingCate','c_id');
    }

}

<?php

namespace agence;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public function categories(){

        return $this->hasMany('agence\BlogCategory');

    }
}

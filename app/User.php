<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    //
    protected $id;
    protected $first_name;

    protected $last_name;

    protected $email;

    public function books(){
        return $this->hasMany('App\Book');
    }

}

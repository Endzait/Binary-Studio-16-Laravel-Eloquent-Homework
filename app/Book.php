<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $id;
    protected $title;

    protected $author;

    protected $year;

    protected $genre;


    //METHOD FOR DELETING RELATION WITH USER
    public function users(){
        $this->user_id=0;
        $this->save();
    }

    
}

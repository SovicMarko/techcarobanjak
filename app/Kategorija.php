<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    //
    protected $table = 'kategorijas';
    public $primarykey = 'id';
    public $timestamps = true;
}

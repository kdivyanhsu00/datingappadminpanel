<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Device extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'devices';
    

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'created';
    
    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updated';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array

     */
    protected $fillable = [];

    
    
}

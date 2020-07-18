<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'users';

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'password', 'isBlock'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
    ];

    public function getFullNameAttribute() 
    {
        return $this->name.' '.$this->lastname;
    }

    public function device() 
    {
        return $this->hasOne(Device::class, 'userId');
    }

    public function scopeByplan($query, $planId = null) 
    {
        if($planId && $planId != 'all') {
          return $query->where('plan_id', $planId);
        }
        return $query;
    }
}

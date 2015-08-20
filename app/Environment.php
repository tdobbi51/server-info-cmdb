<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'environments';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'notes'];
    

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * Relationship : One-to-Many
     *
     *  An environment can have many applications
     */
    public function applications()
    {
        return $this->hasMany('App\Application');
    }


}

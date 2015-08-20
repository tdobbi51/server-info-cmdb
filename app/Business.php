<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'businesses';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'contact', 'email', 'description', 'notes'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * Relationship : One-to-Many
     *
     *  A business can have many applications
     */
    public function applications()
    {
        return $this->hasMany('App\Application');
    }


}

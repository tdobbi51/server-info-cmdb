<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hosts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hostname', 
                           'type', 
                           'os_type',
                           'os_version',
                           'os_revision',
                           'memory',
                           'cpus',
                           'cores',
                           'speed',
                           'storage',
                           'model',
                           'serial',
                           'asset',
                           'rack',
                           'hostid',
                           'business',
                           'contacts',
                           'inservice_date',
                           'notes'
                        ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
    * Relationship : One-to-Many
    *
    *  A host can have many interfaces
    */
  public function ipinterfaces()
    {
        return $this->hasMany('App\IPinterface');
    }


    /**
     * Relationship : Many-to-Many
     *
     *  A host can have many applications
    */
    public function applications()
    {
        return $this->belongsToMany('App\Application');
    }



}

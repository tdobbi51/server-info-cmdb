<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IPinterface extends Model

{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'interfaces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'ip', 'dns_name', 'host_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Relationship : One-to-One
     *
     *  An interface belongs to one host
     */
    public function host()
    {
        return $this->belongsTo('App\Host');
    }    
}



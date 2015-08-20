<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 
                           'environment_id', 
                           'url', 
                           'description', 
                           'business_id', 
                           'notes', 
                           'devteam_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * Relationship : Many-to-Many
     *
     *  An application can be on many hosts
     */
    public function hosts()
    {
        return $this->belongsToMany('App\Host');
    } 


    /**
     * Relationship : One-to-One
     *
     *  An application belongs to one devteam
     */
    public function devteam()
    {
        return $this->belongsTo('App\Devteam');
    } 


    /**
     * Relationship : One-to-One
     *
     *  An application belongs to one environment
     */
    public function environment()
    {
        return $this->belongsTo('App\Environment');
    } 


    /**
     * Relationship : One-to-One
     *
     *  An application belongs to one business
     */
    public function business()
    {
        return $this->belongsTo('App\Business');
    } 


    // /**
    //  *  Take array of hostnames
    //  *  and return array of host ids
    //  *
    //  */
    public static function getHostIds($hosts) 
    {

        // Define array of host_ids
        $hostIDs = array();

        if (!empty($hosts)) {

            // Loop through host names 
            foreach($hosts as $host) {

                // Skip any empty elements
                if (empty($host)) {
                    continue;
                }

                // Query host by name
                $hostObj = Host::where('hostname', $host)->first();

                // Push host id to array
                array_push($hostIDs, $hostObj->id);

            }  

        }  

        return $hostIDs;

    }  

}


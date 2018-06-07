<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'nominee_first_name', 'nominee_last_name', 'nominee_status', 'nominee_work', 'nominee_impact', 'nominee_links', 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function sender()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}

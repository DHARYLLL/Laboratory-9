<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable = [

        'country_name',
        'region_id'
    ];

    public function regions()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function locations()
    {
        return $this->hasMany(Location::class, 'country_id', 'id');
    }
}

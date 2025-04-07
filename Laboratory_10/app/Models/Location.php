<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [

        'steet_address',
        'postal_code',
        'city',
        'state_province',
        'country_id'
    ];

    public function countries()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'location_id', 'id');
    }
}

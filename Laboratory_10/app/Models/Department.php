<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [

        'department_name',
        'location_id'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'id');
    }
}

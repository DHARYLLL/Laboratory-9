<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [

        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'job_id',
        'salary',
        'manager_id',
        'department_id'
    ];

    public function dependents()
    {
        return $this->hasMany(Dependent::class, 'emplyee_id', 'id');
    }

    public function jobs()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}

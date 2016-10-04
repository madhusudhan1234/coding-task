<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'email',
        'address',
        'nationality',
        'date_of_birth',
        'education',
        'contact_from'
    ];
}

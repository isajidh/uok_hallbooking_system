<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'user_name',
        'email',
        'password',
        'authorised_by',
        'university_email',
        'contact_number',
        'academic_year',
    ];
}


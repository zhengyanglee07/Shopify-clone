<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'email',
        'firstName',
        'lastName',
        'company',
        'address',
        'apartment',
        'city',
        'country',
        'postcode',
        'phone'
    ];
}

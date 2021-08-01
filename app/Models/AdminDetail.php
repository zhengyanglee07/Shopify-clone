<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'storeName',
        'firstName',
        'lastName',
        'address',
        'apartment',
        'postcode',
        'city',
        'state',
        'country',
        'phone',
        'website',
        'registered'
    ];
}

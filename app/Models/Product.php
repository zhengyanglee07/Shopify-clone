<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'storeId',
        'title',
        'description',
        'media',
        'price',
        'compareAtPrice',
        'costPerItem',
        'chargeTax',
        'sku',
        'barcode',
        'available',
        'physicalProduct',
        'weight',
        'weightUnit',
        'country',
        'hsCode',
        'variants',
        'pageTitle',
        'pageDescription',
        'pageUrl',
        'status',
        'onlineStore',
        'availableTime',
        'productType',
        'vendor',
        'collections',
        'tags',
        'themeTemplate',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bu extends Model
{
    protected $fillable=[
        'bu_name',
        'bu_price',
        'bu_rent',
        'bu_square',
        'bu_type',
        'bu_place',
        'bu_small_ds',
        'bu_meta',
        'bu_langtude',
        'bu_latitude',
        'bu_large_ds',
        'bu_status',
        'rooms',
        'user_id',
        'image',
    ];
    
    protected $table='bus';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'province_id',
        'city_id',
    ];
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}

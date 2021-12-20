<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
    public function getCreatedDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    public function getCreatedDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
}

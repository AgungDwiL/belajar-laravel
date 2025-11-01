<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['brand_id', 'name', 'img'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}

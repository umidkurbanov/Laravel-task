<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function products() {
       return $this->hasMany(Product::class);
    }
}

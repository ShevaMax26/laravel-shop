<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected static $unguarded = false;
    protected $fillable = ['file_path', 'product_id'];

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->file_path);
    }
}

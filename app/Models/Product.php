<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Filterable;
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'preview_image',
        'old_price',
        'price',
        'count',
        'is_published',
        'category_id',
        'group_id',
    ];
    protected static $unguarded = false;


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->preview_image);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    protected static $unguarded = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

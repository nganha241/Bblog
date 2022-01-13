<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public function Post()
    {
        return $this->hasMany('App\Models\Post', 'category_id', 'id');
    }

    public function getShowURL()
    {
        return route('category', $this->slug);
    }
}

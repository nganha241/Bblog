<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'avatar', 'category_id',  'slug'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id')->withPivot('created_at');
    }

    public function getShowURL()
    {
        return route('post.detail', $this->slug);
    }

    public function description()
    {
        return substr(strip_tags($this->content), 0, 250);
    }
}

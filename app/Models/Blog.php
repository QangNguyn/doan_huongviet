<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'description',
        'content', 'image','is_draft','meta_title',
        'meta_description',
        'meta_keyword'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, "blog_tags");
    }
}

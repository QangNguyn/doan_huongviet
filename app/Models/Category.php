<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'parent_id',
        'meta_title',
        'meta_description',
        'meta_keyword'
    ];
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function delete()
    {
        $this->children()->each(function ($child) {
            $child->delete();
        });

        return parent::delete();
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function allProducts()
    {
        return $this->hasManyThrough(Product::class, Category::class, 'parent_id', 'category_id', 'id', 'id');
    }
}

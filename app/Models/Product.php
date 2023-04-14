<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;

class Product extends Model
{
    use HasFactory, Filterable;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'status',
        'trending',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function discount()
    {
        $discount =  floor(($this->selling_price / $this->original_price - 1) * 100) . '%';
        return $discount;
    }
    public function FormatSellingPrice()
    {
        return  number_format($this->selling_price) . 'đ';
    }
    public function FormatOriginalPrice()
    {
        return number_format($this->original_price) . 'đ';
    }

    public function getDiscountPercentageAttribute()
    {
        return $this->selling_price > 0 ? ($this->selling_price / $this->original_price) * 100 : 0;
    }
    public function formatPrice($value)
    {
        return number_format($value) . 'đ';
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'prod_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address1',
        'address2',
        'status',
        'message',
        'tracking_no',
        'total_price',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

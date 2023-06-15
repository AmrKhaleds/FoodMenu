<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['order_number', 'order_amount', 'order_status', 'order_tax', 'order_traking_number', 'order_user_name', 'order_user_email', 'order_user_phone', 'order_user_address', 'order_user_address2', 'order_user_city', 'order_user_country', 'order_type', 'created_at', 'updated_at'];

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

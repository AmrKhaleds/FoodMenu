<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_id', 'discount_type', 'discount', 'status', 'start_date', 'end_date', 'created_at','updated_at'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}

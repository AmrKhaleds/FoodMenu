<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc', 'photo', 'price', 'status', 'quantity', 'category_id','created_at', 'updated_at'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function getDiscountPrice(){
        if($this->offer){
            $discount = $this->offer->discount;
            if($this->offer->discount_type == 'price'){
                return $this->price - $discount;
            }else{
                return $this->price - ($this->price * $discount / 100);
            }
        }
        return $this->price;
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }
}

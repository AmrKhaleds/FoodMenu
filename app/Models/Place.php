<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tax', 'city_id', 'created_at', 'updated_at'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

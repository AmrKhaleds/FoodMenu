<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'slug', 'status', 'created_at', 'updated_at'];

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function save(array $options = [])
    {
        if (!$this->slug) {
            $this->slug = $this->generateUniqueSlug($this->name);
        }

        return parent::save($options);
    }

    private function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;

        // Check if the slug already exists in the database
        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . Str::random(5);
        }

        return $slug;
    }
}

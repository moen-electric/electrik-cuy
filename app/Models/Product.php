<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
       $query->when($filters['search'] ?? false, function($query, $search) {
        return $query->where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        });
    });
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('name', $category);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}

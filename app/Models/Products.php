<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('name', $category);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category');
    }

    public function cart()
    {
        return $this->hasMany(Carts::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transactions::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'supplier_id', 'sku', 'description', 'cost_price', 'unit_price', 'reorder_level', 'quantity', 'unit',
        'baseimage', 'alt_description', 'has_serial', 'serialno', 'tax1', 'tax2', 'attributes', 'loc',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_items', 'item_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'item_id');
    }
    
}

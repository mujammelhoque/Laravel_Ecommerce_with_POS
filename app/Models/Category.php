<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_id', 'description'];
    public function item()
    {
        return $this->belongsToMany(Items::class, 'categories_items', 'category_id', 'item_id');
    }
    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}

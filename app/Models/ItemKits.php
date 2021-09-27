<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemKits extends Model
{
    use HasFactory;
    public function itemkitproduct()
    {
        return $this->hasMany(ItemKitProduct::class, 'item_id');
    }
}

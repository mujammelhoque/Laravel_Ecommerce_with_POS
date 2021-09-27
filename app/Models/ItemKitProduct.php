<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemKitProduct extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id');
    }
}


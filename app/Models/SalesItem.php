<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    use HasFactory;
    protected $fillable = ['created_at '];
    public function item()
    {
        return $this->belongsTo(Items::class, 'items_id');
    }
    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sales_id');
    }
}

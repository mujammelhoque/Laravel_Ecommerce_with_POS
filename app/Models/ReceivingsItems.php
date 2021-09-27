<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivingsItems extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(Items::class, 'items_id');
    }
}

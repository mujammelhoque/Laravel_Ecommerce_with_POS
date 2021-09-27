<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Items;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['item_id','name','note'];

    public function item()
    {
        return $this->belongsTo(Items::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['coupon', 'value', 'coupon_validity', 'price_limit', 'used', 'max_used', 'created_at'];
    public function whoused()
    {
        return $this->hasMany(WhoUsed::class, 'coupon_id');
    }
}

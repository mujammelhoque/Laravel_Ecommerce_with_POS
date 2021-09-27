<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhoUsed extends Model
{
    use HasFactory;
    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

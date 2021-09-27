<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giftcard extends Model
{
    use HasFactory;
    protected $fillable=[
        'customer_id','expire_date','value','updated_at'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}

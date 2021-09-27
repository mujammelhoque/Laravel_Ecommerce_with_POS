<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = ['order_status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function salesitem()
    {
        return $this->hasMany(SalesItem::class, 'sales_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function shippingdetails()
    {
        return $this->belongsTo(ShippingDetails::class, 'sales_id');
    }
}

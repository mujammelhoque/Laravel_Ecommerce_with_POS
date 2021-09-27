<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        "first_name", "user_id", "last_name", "gender", "email", "phone", "address1", "address2", "city", "state", "zip", "country", "company", "account", "total", "discount", "taxable", "comments"
    ];
}

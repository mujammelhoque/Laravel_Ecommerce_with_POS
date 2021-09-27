<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    protected $fillable=[
        'company_name','agency_name','account_number','first_name','last_name','gender','phone','email','address1','address2',
        'city','state','zip','country','comments'
        ];
}

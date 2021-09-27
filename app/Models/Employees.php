<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $fillable=[
        'loginname','password','role','first_name','first_name','gender','phone',
        'email','image','updated_at'
    ];
}

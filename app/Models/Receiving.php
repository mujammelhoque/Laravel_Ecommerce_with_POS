<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiving extends Model
{
    use HasFactory;
    public function suppliers()
    {
        return $this->belongsTo(Suppliers::class, 'supplier_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }
}

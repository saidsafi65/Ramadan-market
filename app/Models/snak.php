<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class snak extends Model
{
    use HasFactory;
    protected $fillable = ['snaks_type','snaks_weight','snaks_prise','is_loan','loan_name','remm'];
}

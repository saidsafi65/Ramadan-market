<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectrsitySellingBalances extends Model
{
    use HasFactory;
    protected $fillable = ['electrsity_blance','selling_blance','remaining_blance','is_loan','loan_name','remm'];
}

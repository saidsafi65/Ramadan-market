<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawalSellingBalances extends Model
{
    use HasFactory;
    protected $fillable = ['jawal_blance','selling_blance','remaining_blance','is_loan','loan_name','remm'];
}

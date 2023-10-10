<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobileEx_expense extends Model
{
    use HasFactory;
    protected $fillable = ['mobileEx_type','mobileEx_total','is_loan_mobileEx','loan_name_mobileEx','mobileEx_remm'];
}

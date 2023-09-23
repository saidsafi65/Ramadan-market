<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyCard extends Model
{
    use HasFactory;
    protected $fillable = ['cardtype','number_dailycard','total_dailycard','is_loan','loan_name','remm'];
}

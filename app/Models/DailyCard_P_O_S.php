<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyCard_P_O_S extends Model
{
    use HasFactory;
    protected $fillable = ['cardtype','number_dailycard','owner_dailycard','total_dailycard','is_loan','loan_name','remm'];

}

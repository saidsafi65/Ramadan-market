<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyHomeNet extends Model
{
    use HasFactory;
    protected $fillable = ['homenet_name','homenet_no','homenet_month','homenet_total','is_loan','loan_name','remm'];

}

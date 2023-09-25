<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraderDebt extends Model
{
    use HasFactory;
    protected $fillable = ['debt_type','debt_name','debt_money','remm','date_paying'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal_expense extends Model
{
    use HasFactory;
    protected $fillable = ['personal_expense_total','personal_remm'];
}

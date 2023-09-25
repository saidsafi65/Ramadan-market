<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OoredoOBalance extends Model
{
    use HasFactory;
    protected $fillable = ['ooredo_blance','recent_add','recent_withdrawn','old_ooredo_blance','is_debt','trader_name','remm'];
}

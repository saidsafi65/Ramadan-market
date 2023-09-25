<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawalBalance extends Model
{
    use HasFactory;
    protected $fillable = ['jawal_blance','recent_add','recent_withdrawn','old_jawal_blance','is_debt','trader_name','remm'];
}

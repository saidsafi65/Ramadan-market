<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectristyBalance extends Model
{
    use HasFactory;
    protected $fillable = ['electristy_blance','recent_add','recent_withdrawn','old_electristy_blance','is_debt','trader_name','remm'];
}

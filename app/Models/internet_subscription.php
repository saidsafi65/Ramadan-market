<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class internet_subscription extends Model
{
    use HasFactory;
    protected $fillable = ['internet_sub_salarie','internet_sub_total','internet_sub_remm'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loans extends Model
{
    use HasFactory;
    protected $fillable = ['loan_type','loan_name','loan_money','remm','date_paying'];

}

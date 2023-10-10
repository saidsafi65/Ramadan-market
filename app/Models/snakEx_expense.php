<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class snakEx_expense extends Model
{
    use HasFactory;
    protected $fillable = ['snakEx_type','snakEx_total','is_loan_snakEx','loan_name_snakEx','snakEx_remm'];
}

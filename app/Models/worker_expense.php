<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class worker_expense extends Model
{
    use HasFactory;
    protected $fillable = ['name_workers_salarie','workers_salarie_total','worker_remm'];
}

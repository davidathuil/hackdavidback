<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunningOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id_run_orders'];
}

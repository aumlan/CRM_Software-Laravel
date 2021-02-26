<?php

namespace App\Models\manager_module;

use App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';
    public $timestamps = false;
    use HasFactory;
}

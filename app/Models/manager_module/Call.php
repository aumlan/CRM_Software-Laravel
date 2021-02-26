<?php

namespace App\Models\manager_module;

use App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'calls';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}

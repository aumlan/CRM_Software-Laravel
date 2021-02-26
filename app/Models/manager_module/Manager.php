<?php

namespace App\Models\manager_module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'manager';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}

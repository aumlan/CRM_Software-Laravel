<?php

namespace App\Models\manager_module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}

<?php

namespace App\Models\manager_module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'note';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}

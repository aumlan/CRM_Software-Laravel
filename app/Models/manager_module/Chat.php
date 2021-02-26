<?php

namespace App\Models\manager_module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}

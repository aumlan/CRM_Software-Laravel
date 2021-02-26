<?php

namespace App\Models\clientUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'message';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
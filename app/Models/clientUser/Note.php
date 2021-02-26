<?php

namespace App\Models\clientUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = 'note';
    protected $primaryKey = 'id';
    public $timestamps = false;
}

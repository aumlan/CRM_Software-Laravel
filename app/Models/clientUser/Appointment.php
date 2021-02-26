<?php

namespace App\Models\clientUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointment';
    protected $primaryKey = 'id';
    public $timestamps = false;
}

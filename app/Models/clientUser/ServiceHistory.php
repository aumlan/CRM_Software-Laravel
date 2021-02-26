<?php

namespace App\Models\clientUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceHistory extends Model
{
    use HasFactory;
    protected $table = 'service_history';
    protected $primaryKey = 'service_history_id';
    public $timestamps = false;
}

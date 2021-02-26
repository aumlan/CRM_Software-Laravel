<?php

namespace App\Models\manager_module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}

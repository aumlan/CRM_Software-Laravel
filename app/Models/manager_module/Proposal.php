<?php

namespace App\Models\manager_module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'proposal';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}

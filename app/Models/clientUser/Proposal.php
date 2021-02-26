<?php

namespace App\Models\clientUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = 'proposal';
    protected $primaryKey = 'id';
    public $timestamps = false;
}

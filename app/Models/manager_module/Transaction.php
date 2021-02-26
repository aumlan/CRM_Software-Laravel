<?php

namespace App\Models\manager_module;

use App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'valid_transaction_list';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}

<?php

namespace App\Models\clientUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingTransactionLog extends Model
{
    use HasFactory;
    protected $table = 'pending_transaction_log';
    protected $primaryKey = 'id';
    public $timestamps = false;
}

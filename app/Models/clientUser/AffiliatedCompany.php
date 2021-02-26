<?php

namespace App\Models\clientUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatedCompany extends Model
{
    use HasFactory;
    protected $table = 'affiliated_companies';
    protected $primaryKey = 'affiliated_company_id';
    public $timestamps = false;
}

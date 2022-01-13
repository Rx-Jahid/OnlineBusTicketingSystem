<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $table = 'companies';
    public $timestamps = false;
    protected $primaryKey = 'company_id';
    protected $fillable = [
        'company_name',
        'email',
        'address',
        'phone',
        'logo',
        '_token',
    ];

}

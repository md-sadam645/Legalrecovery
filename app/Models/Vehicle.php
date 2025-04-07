<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'registration_numbers',
        'chasisnum',
        'enginenum',
        'allocation',
        'agreementid',
        'username',
        'emi_amt',
        'pos',
        'tbr',
        'bkts',
        'bank',
        'productname',
        'model',
        'address',
        'file_id',
        'add_by',
        'add_by_name'
    ];
}

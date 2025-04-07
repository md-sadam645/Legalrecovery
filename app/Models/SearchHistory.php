<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    protected $fillable = [
        'registration_numbers',
        'chasisnum',
        'enginenum',
        'date',
        'time',
        'user_id'
    ];
}

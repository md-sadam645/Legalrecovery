<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessContact extends Model
{
    protected $fillable = [
        "business_email",
        "warning_text",
        "status"
    ];
}

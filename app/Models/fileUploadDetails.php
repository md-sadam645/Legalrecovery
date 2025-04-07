<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fileUploadDetails extends Model
{
    protected $fillable = [
        'last_data_uploaded_date',
        'current_data_uploaded_date',
        'data_fetched_date',
        'filename',
        'file_url',
        'admin_name',
        'admin_id',
    ];
}

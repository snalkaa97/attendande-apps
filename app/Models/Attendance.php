<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';
    
    Protected $fillable = [
        'id',
        'name',
        'instansi',
        'photo',
        'tanggal',
        'is_checkin',
    ];
}

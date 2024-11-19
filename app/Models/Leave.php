<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    /** @use HasFactory<\Database\Factories\LeaveFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'leave_type_id',
        'company_id',
        'start_date',
        'end_date',
        'is_half_day',
        'total_days',
        'reason',
        'is_paid',
        'status',
        'created_by',
        'updated_by',
    ];
}

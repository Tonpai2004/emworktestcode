<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worklog extends Model
{
    protected $fillable = [
        'task_type', 'task_name', 'start_time', 'end_time', 'status',
    ];
}


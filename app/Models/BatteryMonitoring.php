<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatteryMonitoring extends Model
{
    use HasFactory;

    protected $table = 'battery_monitoring';

    protected $fillable = [
        'project_id',
        'battery_level',
        'timestamp',
        'percobaan',
    ];

    public $timestamps = false;
}

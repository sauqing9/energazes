<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistanceMonitoring extends Model
{
    use HasFactory;

    protected $table = 'distance_monitoring';

    protected $fillable = [
        'project_id',
        'distance_covered',
        'timestamp',
        'percobaan',
    ];

    public $timestamps = false; // Assuming you're not using created_at and updated_at
}

<?php

namespace App\Models;

use Blaze\AdminCore\Models\Service;
use Illuminate\Database\Eloquent\Model;

class ServiceDeparture extends Model
{
    protected $fillable = [
        'service_id',
        'start_date',
        'end_date',
        'seats_total',
        'seats_booked',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

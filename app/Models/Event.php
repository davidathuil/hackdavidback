<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [

        'names_events',
        'start_dates_events',
        'end_dates_events',
        'end_dates_inscriptions_events',
        'location_events',
    ];

    public function userevents()
    {
        return $this->hasMany(UserRoleEvent::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}

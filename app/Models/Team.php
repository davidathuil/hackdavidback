<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function userT()
    // {
    //     return $this->belongsToMany(UserTeam::class, 'user_teams');
    // }

    public function usert()
    {
        return $this->belongsToMany(UserTeam::class, 'user_teams');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function usert()
    {
        return $this->hasMany(UserTeam::class);
    }
    public function room()
    {
        return $this->hasOne(Room::class, 'id');
    }
}

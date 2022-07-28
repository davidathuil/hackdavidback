<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoleEvent extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function roles()
    {
        return $this->belongsTo(Role::class);
    }
}

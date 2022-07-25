<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'names_roles'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role_events');
    }

    public function events()
    {
        return $this->belongsToMany(Events::class, 'user_role_events');
    }
}

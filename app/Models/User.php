<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [

        'password',
        'firstname_users',
        'lastname_users',
        'email_users',
        'adress_users',
        'likedin_link_users',
        'web_link_users',
        'github_link_users',
        'portfolio_link_users',
        'biography_users',
        'image_link_users',
        'admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userSkills()
    {
        return $this->hasMany(UserSkill::class,);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role_events');
    }

    public function events()
    {
        return $this->belongsToMany(Events::class, 'user_role_events');
    }

    public function userteam()
    {
        return $this->hasMany(UserTeam::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skills');
    }
}

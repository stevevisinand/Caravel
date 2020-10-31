<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group')
                    ->withPivot('isApprouved')
                    ->as('subscription')
                    ->withTimestamps();
    }

    public function groupsAvailable() {
        return $this->groups()->wherePivot('isApprouved', '=', 1);
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function attachements()
    {
        return $this->hasMany('App\Models\Attachement');
    }
}

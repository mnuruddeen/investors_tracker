<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;
    /*       ACTIVITY LOG           */
    //Activity log Attributes
    protected static $logAttributes = ['name', 'email','password'];

    protected static $ignoreChangedAttributes = ['password','updated_at'];

    protected static $logOnlyDirty = true;

    //all the `created`,`updated`,`deleted` event will get logged automatically
    protected static $recordEvents = ['created','updated','deleted'];

    protected static $logName = 'user';
    /*       ACTIVITY LOG           */

    public function getDescriptionForEvent(string $eventName): string
    {
        return "You have {$eventName} a user";
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'psn',
        'is_admin',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

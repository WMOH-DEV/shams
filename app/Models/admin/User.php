<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = ['email_verified_at' => 'datetime',];

    // add property name in $appends array
    protected $appends = ['image_path'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }


    public function opinions()
    {
        return $this->hasMany(Opinion::class);

    } // End Opnion

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Add a function to get the property value
    public function getImagePathAttribute(): string
    {
        return asset('uploads/' . $this->avatar);
    }

}

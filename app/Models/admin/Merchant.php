<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Merchant extends Model
{

    public $table = 'users';

    use HasFactory, Notifiable;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // add property name in $appends array
    protected $appends = ['image_path'];

    // Add a function to get the property value
    public function getImagePathAttribute(): string
    {
        return $this->avatar ? asset('uploads/' . $this->avatar) : asset('admin/assets/media/avatars/avatar0.jpg');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class,'user_id');
    }
}

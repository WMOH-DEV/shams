<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // add property name in $appends array
    protected $appends = ['image_path'];

    public static function vat()
    {
        return Setting::first()->vat_rate / 100;
    }

    // Add a function to get the property value
    public function getImagePathAttribute(): string
    {
        return $this->site_logo ? asset('uploads/' . $this->site_logo) : asset('admin/assets/media/imgs/logo.png');
    }

}

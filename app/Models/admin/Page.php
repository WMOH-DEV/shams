<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function setSlugAttribute()
    {
        if (isset($this->name)) {
            $this->attributes['slug'] = Str::slug($this->name);
        }
    }
}

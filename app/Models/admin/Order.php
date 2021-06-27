<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function modela()
    {
        return $this->belongsTo(Modela::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('id', 'like', $term)
//                ->orWhere('id', 'like', $term)
                ->orWhereHas('user', function ($q) use ($term) {
                    $q->where('name', 'like', $term);
                });
        });
    } // End Search


}

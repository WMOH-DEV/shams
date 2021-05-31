<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function city()
    {
        return $this->belongsTo(City::class);
    } // End city

    public function merchant()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    } // End user

    public function order()
    {
        return $this->belongsTo(Order::class);
    } // End order


    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('id', 'like', $term)
                ->orWhereHas('merchant', function ($q) use ($term) {
                    $q->where('name', 'like', $term);
                })
                ->orWhereHas('city', function ($q) use ($term) {
                    $q->where('name', 'like', $term);
                });
        });
    } // End Search


}

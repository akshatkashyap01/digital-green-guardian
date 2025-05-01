<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityUpload extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPhotoUrlAttribute()
    {
        return asset('storage/' . $this->photo);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

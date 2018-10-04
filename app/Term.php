<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $guarded = [];

    public static function forPlatform($key)
    {
        return static::whereHas('platforms', function ($query) use ($key) {
            $query->where('key', $key);
        })->get();
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }
}

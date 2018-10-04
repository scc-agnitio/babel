<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Term
 *
 * @package App
 */
class Term extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @param $key
     * @return mixed
     */
    public static function forPlatform($key)
    {
        return static::whereHas('platforms', function ($query) use ($key) {
            $query->where('key', $key);
        })->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }

    public function translations()
    {
        return $this->hasMany(Translation::class);
    }

}

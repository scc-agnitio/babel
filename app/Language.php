<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 *
 * @package App
 */
class Language extends Model
{
    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translations()
    {
        return $this->hasMany(Translation::class, 'language_code', 'code');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    //
    protected $guarded = [];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_code', 'code');
    }

}

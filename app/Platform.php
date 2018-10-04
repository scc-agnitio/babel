<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $guarded = [];

    public function terms()
    {
        return $this->belongsToMany(Term::class);
    }
}

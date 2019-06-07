<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function buttonClicks()
    {
        return $this->hasMany(ButtonClick::class);
    }
}

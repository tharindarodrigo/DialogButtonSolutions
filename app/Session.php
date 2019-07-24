<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}

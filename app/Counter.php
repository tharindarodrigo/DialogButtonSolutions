<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    public function counterCategory()
    {
        return $this->belongsTo(CounterCategory::class);
    }
}

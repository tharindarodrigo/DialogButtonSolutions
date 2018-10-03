<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CounterButton extends Model
{
    public function counter()
    {
        return $this->belongsTo(Counter::class);
    }


}

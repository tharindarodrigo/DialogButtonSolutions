<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ButtonClick extends Model
{
    public function button()
    {
        return $this->belongsTo(Button::class);
    }
}

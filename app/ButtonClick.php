<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ButtonClick extends Model
{
    public function button()
    {
        return $this->belongsTo(Button::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function buttonType()
    {
        return $this->belongsTo(ButtonType::class);
    }
}

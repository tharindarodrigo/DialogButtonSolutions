<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
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

    public function buttonClicks()
    {
        return $this->hasMany(ButtonClick::class);
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches()
    {
        return $this->hasMany(Branch::class, 'company_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function buttons()
    {
        return $this->hasMany(Button::class);
    }

    public function buttonClicks()
    {
        return $this->hasMany(ButtonClick::class);
    }
}

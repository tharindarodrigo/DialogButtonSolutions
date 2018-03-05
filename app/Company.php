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
}

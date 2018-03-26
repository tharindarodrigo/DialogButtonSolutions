<?php

namespace App;

use App\User;
use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class MenuHandler implements FilterInterface
{
    public $user;

    public function __construct()
    {
        $this->user = User::find(Auth::id());
    }
    
    public function transform($item, Builder $builder)
    {
        if (isset($item['role']) && ! $this->user->hasRole($item['role'])) {
            return false;
        }

        return $item;
    }
}
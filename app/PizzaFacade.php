<?php

namespace Sharryy\App\Models;

use Illuminate\Support\Facades\Facade;

class Pizza extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Models\Pizza::class;
    }

}

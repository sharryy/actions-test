<?php

namespace Sharryy\App\Models;

use Illuminate\Support\Facades\Facade;

class Sharryy\App\Models\Payment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return App\Models\Sharryy\App\Models\Payment:class;
    }

}

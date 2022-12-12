<?php

namespace Sharryy\App\Models;

use Illuminate\Support\Facades\Facade;

class Payment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Models\Payment::class;
    }

}

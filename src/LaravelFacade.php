<?php

namespace Webberman\Helper;

use Illuminate\Support\Facades\Facade;

class LaravelFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'helper';
    }
}

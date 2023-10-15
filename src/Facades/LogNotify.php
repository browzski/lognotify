<?php

namespace Browszki\LogNotify\Facades;

use Illuminate\Support\Facades\Facade;

class LogNotify extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'lognotify';
    }
}
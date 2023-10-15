<?php

namespace Browszki\LogNotify\Facades;

use Illuminate\Support\Facades\Facade;

class LogNotify extends Facade
{
    /**
     * @method string messages($message)
     * @method string level($level)
     * @method string|array channel($channel)
     * @method void send()
     */
    protected static function getFacadeAccessor(): string
    {
        return 'lognotify';
    }
}
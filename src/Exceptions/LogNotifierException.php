<?php

namespace LogNotify\Exceptions;

use Exception;

class LogNotifierException extends Exception
{
    public static function missingChannel(): static
    {
        return new static(
            'Channel is not supported yet!!!'
        );
    }

    public static function missingValue($attributes): static
    {
        return new static(
            `{$attributes} value is required`
        );
    }
}
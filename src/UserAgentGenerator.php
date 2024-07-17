<?php

namespace Dant\RandUa;

class UserAgentGenerator
{
    public static function create()
    {
        return new static();
    }

    public function getUserAgent(string $browser = ''): string
    {
        return $browser;
    }
}

<?php

namespace Result;

/**
 */
final class Hold
{
    public static array $map = [];

    /**
     *
     * @return object
     */
    public static function pop(): object
    {
        return array_pop(self::$map);
    }
}

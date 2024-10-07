<?php

declare(strict_types=1);

namespace Result;

/**
 *
 */
class Purse
{
    /**
 *  The concept is simple.
 *  Just put the object int the bag.
 *  And take it out later with the grab method.
 *
 *  This method is returning an enum Result.
     * @param Item $bag
     * @return Result
     */
    public static function put(Item $bag): Result
    {
        try {
            $value = $bag->grab();
            return Result::Ok->hold($value);
        } catch (\Throwable $exception) {
            return Result::Error->hold($exception);
        }
    }
}

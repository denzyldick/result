<?php

declare(strict_types=1);

namespace Denzyl\Result;

use Exception;

class Result
{
    /**
     * @todo add more ways to detect errors when calling a method.
     * @param Item $bag
     * @return R
     */
    public static function bag(Item $bag): R
    {
        try {
            $value = $bag->baggable();
            return R::Ok->hold($value);
        } catch (Exception $exception) {
            return R::Error->hold($exception);
        }
    }
}

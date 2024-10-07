<?php

use Result\Item;
use Result\Purse;
use Result\Result;

class Client implements Item
{
    public static int $amount = 0;

    /**
     *
     */
    public function get(): Result
    {
        return Purse::put($this);
    }


    /**
     * @return array
     * @throws Exception
     */
    public function grab(): array
    {
        if (self::$amount > 5) {
            throw new Exception("Dummy exception.");
        }
        return ["Hello world"];
    }
}

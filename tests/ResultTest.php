<?php

use Denzyl\Result\Item;
use Denzyl\Result\R;
use Denzyl\Result\Result;
use Denzyl\Result\ResultInterface;
use Denzyl\Result\Bag;
use PHPUnit\Framework\TestCase;

/**
 * The test for the result error handeling.
 * @link https://google.com
 */
class ResultTest extends TestCase
{
    /**
     * Test the result error handling.
     *
     * @return void
     */
    public function testResult(): void
    {
        $suspect = new Suspect();

        $message = match ($suspect->fetch()) {
            R::Ok => R::Ok->grab(),
            R::Error => R::Error->grab()
        };

      var_dump($message);
    }
}

class Suspect implements Item
{
    /**
     *
     */
    public function fetch(): R
    {
        return Result::bag($this);
    }


    /**
     * @throws Exception
     */
    public function baggable()
    {
        throw new Exception();
        return new ArrayObject([]);
    }
}

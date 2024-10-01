<?php

declare(strict_types=1);

namespace Denzyl\Result;

use AllowDynamicProperties;
use Denzyl\Result\ResultInterface;

/**
*
*
*
 * @property $value
 */
#[AllowDynamicProperties]
enum R implements ResultInterface
{
    case Ok;
    case Error;

    public function hold($exception): self
    {
        $id =  spl_object_hash($exception);
        Hold::$test[$id] = $exception;
        return $this;
    }

    public function grab()
    {
        var_dump(Hold::$test);
        var_dump(spl_object_hash($this));
        return Hold::$test[spl_object_hash($this)];
    }
}

class Hold
{
    public static array $test = [];
    public static function add()
    {
    }
}

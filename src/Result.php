<?php

declare(strict_types=1);

namespace Result;

use Exception;

/**
 *
 */
enum Result
{
    case Ok;

    case Error;

    public function hold(object $object): self
    {
        $hash = spl_object_hash($object);
        Hold::$map[$hash] = [];
        Hold::$map[$hash] = $object;
        return $this;
    }

    /**
     * Collect the real object from the bag.
     * @return Exception
     */
    public function exception(): Exception
    {
        return Hold::pop();
    }

    /**
     */
    public function collect(): object
    {
        return Hold::pop();
    }
}

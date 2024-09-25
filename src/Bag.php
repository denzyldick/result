<?php

declare(strict_types=1);

namespace Denzyl\Result;

trait Bag
{
    public $value;
    public function hold($value): self
    {
        $this->value = $value;
        return $this;
    }

    public function grab()
    {
        return $this->value;
    }
}

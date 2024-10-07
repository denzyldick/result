<?php

class OrderService
{
    /**
     *
     * @param ArrayAccess $array
     * @return string
     */
    public function handle(ArrayAccess $array): string
    {
        return $array[0];
    }
}

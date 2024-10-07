<?php

use Result\Result;
use PHPUnit\Framework\TestCase;

/**
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
        $client = new Client();

        $amount = match ($client->get()) {
            Result::Ok => (new OrderService())->handle(Result::Ok->collect()),
            Result::Error => function () {
                return 0;
            }
        };

        $actual = "Hello world";
        $this->assertEquals($amount, $actual);
    }

    /**
     * Test the result error handling.
     *
     * @return void
     */
    public function testIgnoreException(): void
    {
        $client = new Client();

        $amount = match ($client->get()) {
            Result::Ok => (new OrderService())->handle(Result::Ok->collect()),
            Result::Error => function () {
                return 0;
            }
        };

        $actual = 0;
        $this->assertEquals($amount, $actual);
    }

    public function testException()
    {
        $client = new Client();

        $client::$amount = 5;

        $error = match ($client->get()) {
            Result::Ok => function () {

            },
            Result::Error => function () {
                return new OrderException(Result::Error->collect());
            }
        };

        $message = "Dummy Exception.";
        $this->assertEquals($message, $error->getMessage());
    }
}

<?php

use PHPUnit\Framework\TestCase;
use Uptodown\RandomUsernameGenerator\Generator;

class GeneratorTest extends TestCase
{
    public function testMakeNew()
    {
        $generator = new Generator();
        for ($index = 1; $index < 10000; $index++) {
            $usernames[] = $generator->makeNew();
        }
        $this->assertTrue(count(array_unique($usernames)) === count($usernames));
    }
}

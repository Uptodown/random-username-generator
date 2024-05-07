<?php

use PHPUnit\Framework\TestCase;
use Uptodown\RandomUsernameGenerator\Generator;

class GeneratorTest extends TestCase
{
    public function testMakeNew() : void
    {
        $generator = new Generator();
        for ($index = 1; $index < 10000; $index++) {
            $usernames[] = $generator->makeNew();
        }
        self::assertCount(count(array_unique($usernames)), $usernames);
    }
}

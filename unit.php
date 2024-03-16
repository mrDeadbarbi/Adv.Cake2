<?php

require 'Reverse.php';

use PHPUnit\Framework\TestCase;

class ReverseWordsTest extends TestCase
{
    public function testWords()
    {
        $data = new Reverse();
        $input = "Hello World!";
        $expectedOutput = "olleH dlroW!";
        $this->assertEquals($expectedOutput, $data->reverseWords($input));
    }

    public function testUnicode()
    {   $data = new Reverse();
        $input = "Привет, мир!";
        $expectedOutput = "тевирП, рим!";
        $this->assertEquals($expectedOutput, $data->reverseWords($input));
    }

    public function testPunctuation()
    {   $data = new Reverse();
        $input = "Test... sentence!";
        $expectedOutput = "tseT... ecnetnes!";
        $this->assertEquals($expectedOutput, $data->reverseWords($input));
    }

    public function testNumbers()
    {   $data = new Reverse();
        $input = "12345 67890";
        $expectedOutput = "54321 09876";
        $this->assertEquals($expectedOutput, $data->reverseWords($input));
    }

    public function testEmptyString()
    {   $data = new Reverse();
        $input = "";
        $expectedOutput = "";
        $this->assertEquals($expectedOutput, $data->reverseWords($input));
    }
}
<?php

use PHPUnit\Framework\TestCase;
use Forceedge01\BDDStaticAnalyserRules\Entities;

class ConfigTest extends TestCase
{
    public function setUp(): void
    {
        $this->testObject = new Entities\Config(__DIR__ . '/config', [
            'config' => [
                'abc' => 1111,
                'params' => '2',
                'path' => '<relative_path>/ScenarioTest.php'
            ]
        ]);
    }

    public function testGet()
    {
        $result = $this->testObject->get('abc');

        self::assertSame(1111, $result);
    }

    public function testGetPath()
    {
        $result = $this->testObject->getPath('path');

        self::assertSame(__DIR__ . '/ScenarioTest.php', $result);
    }
}

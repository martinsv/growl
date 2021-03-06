<?php
use BryanCrowe\Growl\Builder\GrowlNotifyWindowsBuilder;

class GrowlNotifyWindowsBuilderTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->GrowlNotifyWindowsBuilder = new GrowlNotifyWindowsBuilder();
    }

    public function tearDown()
    {
        unset($this->GrowlNotifyWindowsBuilder);
        parent::tearDown();
    }

    public function testBuild()
    {
        $options = [
            'title' => 'Hello',
            'appIcon' => 'Mail',
            'url' => 'http://www.example.com',
            'message' => 'World',
            'sticky' => true
        ];
        $expected = 'growlnotify /t:Hello /ai:Mail /cu:' .
                    'http://www.example.com /s:true World';
        $result = $this->GrowlNotifyWindowsBuilder->build($options);
        $this->assertSame($expected, $result);

        $options = [
            'title' => 'Hello',
            'message' => 'World',
            'sticky' => false
        ];
        $expected = 'growlnotify /t:Hello World';
        $result = $this->GrowlNotifyWindowsBuilder->build($options);
        $this->assertSame($expected, $result);
    }
}

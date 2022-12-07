<?php


namespace Nerd4ever\Common\Tests;


use Nerd4ever\Common\Tools\PhoneTools;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    const DEFAULT_AREA_CODE = '19';

    public function testE164()
    {
        $this->assertEquals('551931998779', PhoneTools::toE164('31998779', self::DEFAULT_AREA_CODE));
        $this->assertEquals('551931998779', PhoneTools::toE164('1931998779', self::DEFAULT_AREA_CODE));
        $this->assertEquals('551931998779', PhoneTools::toE164('01931998779', self::DEFAULT_AREA_CODE));
        $this->assertEquals('552131998779', PhoneTools::toE164('31998779', '21'));
    }
}
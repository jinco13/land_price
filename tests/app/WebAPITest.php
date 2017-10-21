<?php
namespace LandPrice;

class WebAPITest extends \PHPUnit_Framework_TestCase
{
  public function setUp()
  {
    $this->target = new WebAPI();
  }

  public function testInstance()
  {
    $this->assertInstanceOf('\LandPrice\WebAPI', $this->target);
  }

  public function testClientInstance()
  {
    $this->assertInstanceOf('\GuzzleHttp\Client', $this->target->client);
  }

  public function testTokyoAreaCode()
  {
    $this->assertEquals($this->target->getAreaCode('東京都'), "13");
    $this->assertEquals($this->target->getAreaCode('神奈川県'), "14");
  }
}

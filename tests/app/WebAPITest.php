<?php
namespace LandPrice;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;

class WebAPITest extends \PHPUnit_Framework_TestCase
{
  public function setUp()
  {
    $this->target = new WebAPI();
  }

  public function testGetCityCodeFromAPI()
  {
    $mockData = array("data" => [
      ["id"=>"14100","name"=>"横浜市"],["id"=>"14101","name"=>"鶴見区"]
    ]);
    $mock = new MockHandler([ new Response(200, [], json_encode($mockData), '1.1') ]);

    $handler = HandlerStack::create($mock);
    $this->target = new WebAPI($handler);

    $this->assertEquals(count($this->target->getCityCode('14')), 2);
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

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
}

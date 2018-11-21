<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

class ExampleTest extends TestCase
{
  /** @var RemoteWebDriver */
  private $driver;

  public function setUp()
  {
    $host = 'http://localhost:4444/wd/hub';
    $this->driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
    $this->driver->manage()->window()->maximize();
  }

  public function testSomething()
  {
    $this->driver->get("http://seznam.cz");
    $this->assertTrue(true);
  }

  public function tearDown()
  {
    $this->driver->close();
  }
}

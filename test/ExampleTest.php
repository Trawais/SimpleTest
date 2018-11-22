<?php

use SimpleTest\HomePage;
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

  public function testHappyPath()
  {
    $this->driver->get("http://the-internet.herokuapp.com/");
    $homePage = new HomePage($this->driver);
    $flashMessageText = $homePage->goToLoginPage()
      ->fillInCredentials("tomsmith", "SuperSecretPassword!")
      ->loginSuccessfully()
      ->getFlashMessage()
    ;

    sleep(1);

    $this->assertStringStartsWith("You logged into a secure area!", $flashMessageText);
  }

  public function testNegativePath()
  {
    $this->driver->get("http://the-internet.herokuapp.com/");
    $homePage = new HomePage($this->driver);
    $flashText = $homePage->goToLoginPage()
      ->fillInCredentials("tomsmith", "WrongPassword!")
      ->loginWithFail()
      ->getFlashText()
    ;

    sleep(1);

    $this->assertStringStartsWith("Your password is invalid!", $flashText);
  }

  public function testDropdown()
  {
    $this->driver->get("http://the-internet.herokuapp.com/");
    $homePage = new HomePage($this->driver);

    $selected = $homePage->goToDropdownPage()
      ->selectFirstOption()
      ->getSelectedOption()
    ;

    sleep(1);

    $this->assertEquals("1", $selected);
  }

  public function tearDown()
  {
    $this->driver->close();
  }
}

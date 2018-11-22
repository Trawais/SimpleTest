<?php

namespace SimpleTest;

use Facebook\WebDriver\WebDriverBy;

class LoginPage extends Page
{
  protected function getURLPattern(): string
  {
    return "#/login$#";
  }

  public function fillInCredentials($username, $password)
  {
    $this->driver->findElement(WebDriverBy::id("username"))->sendKeys($username);
    $this->driver->findElement(WebDriverBy::id("password"))->sendKeys($password);

    return $this;
  }

  public function loginSuccessfully()
  {
    $this->driver->findElement(WebDriverBy::xpath('//button[@type="submit"]'))->click();

    return new SecureAreaPage($this->driver);
  }

  public function loginWithFail()
  {
    $this->driver->findElement(WebDriverBy::xpath('//button[@type="submit"]'))->click();

    return new LoginPage($this->driver);
  }

  public function getFlashText()
  {
    return $this->driver->findElement(WebDriverBy::id('flash'))->getText();
  }
}

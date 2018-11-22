<?php

namespace SimpleTest;

use Facebook\WebDriver\WebDriverBy;

class HomePage extends Page
{
  protected function getURLPattern(): string
  {
    return "#the-internet[.]herokuapp[.]com/$#";
  }

  public function goToLoginPage()
  {
    $this->driver->findElement(WebDriverBy::linktext("Form Authentication"))->click();

    return new LoginPage($this->driver);
  }

  public function goToDropdownPage()
  {
    $this->driver->findElement(WebDriverBy::linktext("Dropdown"))->click();

    return new DropdownPage($this->driver);
  }
}

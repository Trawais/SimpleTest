<?php

namespace SimpleTest;

use Facebook\WebDriver\WebDriverBy;

class SecureAreaPage extends Page
{
  protected function getURLPattern(): string
  {
    return "#/secure$#";
  }

  public function getFlashMessage()
  {
    return $this->driver->findElement(WebDriverBy::id('flash'))->getText();
  }
}

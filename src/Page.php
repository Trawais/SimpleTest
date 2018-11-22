<?php

namespace SimpleTest;

use Facebook\WebDriver\Remote\RemoteWebDriver;

abstract class Page
{
  /** RemoteWebDriver $driver */
  protected $driver;

  public function __construct($driver)
  {
    $this->driver = $driver;

    $currentUrl = $this->driver->getCurrentURL();

    if (!preg_match($this->getURLPattern(), $currentUrl)) {
      throw new \Exception("URL '{$currentUrl}' does not match patter '{$this->getURLPattern()}'");
    }
  }

  abstract protected function getURLPattern(): string;
}

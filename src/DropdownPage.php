<?php

namespace SimpleTest;

use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverSelect;

class DropdownPage extends Page
{
  protected function getURLPattern(): string
  {
    return "#/dropdown$#";
  }

  public function selectFirstOption()
  {
    $selectElement = $this->driver->findElement(WebDriverBy::id("dropdown"));

    $select = new WebDriverSelect($selectElement);
    $select->selectByValue("1");

    return $this;
  }

  public function getSelectedOption()
  {
    $selectElement = $this->driver->findElement(WebDriverBy::id("dropdown"));
    $select = new WebDriverSelect($selectElement);

    return $select->getFirstSelectedOption()->getAttribute("value");
  }
}

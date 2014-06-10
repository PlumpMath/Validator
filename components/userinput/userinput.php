<?php

class UserInput
{
  public function __construct($name, $rules, $label)
  {
    $this->name = $name;
    $this->label = $label;
    $this->rules = $rules;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getValue()
  {
    return $this->value;
  }

  public function getRules()
  {
    return $this->rules;
  }

  public function detect()
  {
    return isset($_POST[$this->name]) && $this->value = $_POST[$this->name];
  }

  public function getLabel()
  {
    return $this->label;
  }

  public function __toString()
  {
    return '';
  }
}

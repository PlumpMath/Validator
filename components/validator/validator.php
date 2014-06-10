<?php

class Validator
{
  static $rules;
  public $errors = [];

  public function getRule($name)
  {
    return static::$rules[$name];
  }

  public function getRulesFromString($ruleList)
  {
    if (preg_match('/\|/', $ruleList))
      $names = explode('|', $ruleList);
    else
      $names = [$ruleList];

    $rules = [];

    foreach ($names as $name)
      $rules[] = static::$rules[$name];

    return $rules;
  }

  public function addError($name, $msg)
  {
    $this->errors[$name] = $msg;
  }

  public function checkInput($input)
  {
    $passes = true;

    $rules = $this->getRulesFromString($input->getRules());

    foreach ($rules as $rule)
      if ( ! $passes = ($passes && $rule->passes($input->getValue()))) $this->addError($input->getName(), $rule->report($input->getLabel()));

    return $passes;
  }
}

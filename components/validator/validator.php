<?php

class Validator
{
  public $rules = [];
  public $errors = [];

  public function __construct($rules)
  {
    $this->rules = $rules;
  }

  public function getRule($name)
  {
    return $this->rules[$name];
  }

  public function getRulesFromString($ruleList)
  {
    if (preg_match('/\|/', $ruleList))
      $names = explode('|', $ruleList);
    else
      $names = [$ruleList];

    $rules = [];

    foreach ($names as $name)
      $rules[] = $this->rules[$name];

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

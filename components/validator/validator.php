<?php

class Validator
{
  public $rules = [];

  public function __construct($rules)
  {
    $this->rules = $rules;
  }

  public function getRules($ruleList)
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

  public function isValid($datum, $ruleList)
  {
    $passes = true;

    $rules = $this->getRules($ruleList);

    foreach ($rules as $rule) {
      $passes = $passes && $rule->passes($datum);
    }

    return $passes;
  }
}

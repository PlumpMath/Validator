<?php

class ValidationRule
{
  protected $closure;

  public function __construct($closure)
  {
    $this->closure = $closure;
  }

  public function passes($args)
  {
    return call_user_func($this->closure, $args);
  }
}

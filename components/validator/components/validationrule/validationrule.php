<?php

class ValidationRule
{
  protected $closure;
  protected $msg;

  public function __construct($closure, $msg)
  {
    $this->closure = $closure;
    $this->msg = $msg;
  }

  public function passes($args)
  {
    return call_user_func($this->closure, $args);
  }

  public function report($args)
  {
    return vsprintf($this->msg, $args);
  }
}

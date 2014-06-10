<?php

return [

  'required' => new ValidationRule(

    function ($value) {
      return !! $value;
    },

    '%s is required.'
  ),

  'numeric' => new ValidationRule(

    function ($value) {
      return is_numeric($value);
    },

    '%s must be numeric.'
  ),

  'email' => new ValidationRule(
    
    function ($value) {
      return filter_var($value, FILTER_VALIDATE_EMAIL);
    },

    '%s must be a valid email address.'
  ),

];

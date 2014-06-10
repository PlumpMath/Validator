<?php

require 'components/validator/validator.php';
require 'components/validator/components/validationrule/validationrule.php';

$validator = new Validator([
  'required' => new ValidationRule(function ($value) {
    return !! $value;
  }),
  'numeric' => new ValidationRule(function ($value) {
    return is_numeric($value);
  }),
  'email' => new ValidationRule(function ($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }),
]);

$data = [
  'firstname_passes' => 'Bob',
  'lastname_passes' => 'Smith',
  'email_passes' => 'bobsmith@example.com',
  'firstname_fails' => '',
  'lastname_fails' => '',
  'email_fails_isrequired' => '',
  'email_fails_isemail' => 'bobsmith',
];

$rules = [
  'firstname_passes' => 'required',
  'lastname_passes' => 'required',
  'email_passes' => 'required|email',
  'firstname_fails' => 'required',
  'lastname_fails' => 'required',
  'email_fails_isrequired' => 'required|email',
  'email_fails_isemail' => 'required|email',
];

foreach ($data as $input => $datum) {
  echo "validating Input: <$input>, with value: <$datum> ... ";
  echo ($validator->isValid($datum, $rules[$input])) ? 'passed!' : 'failed.';
  echo "\n";
}

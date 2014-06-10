<?php

require 'components/userinput/userinput.php';

require 'components/validator/validator.php';
require 'components/validator/components/validationrule/validationrule.php';

Validator::$rules = require 'data/config.php';

$validator = new Validator();

$form = [
  'firstname' => new UserInput('firstname', 'required', 'First Name'),
  'lastname' => new UserInput('lastname', 'required', 'Last Name'),
  'email' => new UserInput('email', 'required|email', 'Email Address'),
];

/*DEBUG*/

$_POST['firstname'] = 'Bob';
$_POST['lastname'] = '';
$_POST['email'] = 'yo';

/*ENDDEBUG*/

foreach ($form as $input) {
  $input->detect();

  if ($validator->checkInput($input))
    echo "OK\n";
  else
    echo "Failed\n";
}

print_r($validator->errors);

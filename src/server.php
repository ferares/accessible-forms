<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $error = false;
  $errors = [];

  if ((!isset($_POST['email'])) || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
    $errors['email'] = ['Please input a valid email address.'];
    $error = true;
  }

  if (!isset($_POST['password'])) {
    $errors['password'] = ['Please input a password.'];
    $error = true;
  }

  if ((!isset($_POST['terms'])) || (!$_POST['terms'])) {
    $errors['terms'] = ['Please accept the terms and conditions.'];
    $error = true;
  }

  if ($error) {
    die(utf8_encode(json_encode(array(
      'error' => true,
      'body' => $errors,
    ))));
  } else {
    die(utf8_encode(json_encode(array(
      'error' => false,
      'body' => 'Successful form submission.',
    ))));
  }
}

header('Location: '.'/');

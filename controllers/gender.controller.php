<?php

require_once '../models/Gender.php';

$gender = new Gender();

if (isset($_GET['operacion'])) {
  switch ($_GET['operacion']) {
    case 'getGender':
      echo json_encode($gender->getGender());
      break;
  }
}
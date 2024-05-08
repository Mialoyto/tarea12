<?php

require_once '../models/Publisher2.php';

$publisher = new Publisher();

if (isset($_GET['operacion'])) {
  switch ($_GET['operacion']) {
    case 'getAll':
      echo json_encode($publisher->getAll());
      break;
  }
}

<?php

require_once '../models/Publisher.php';

$publisher = new Publisher();

if (isset($_GET['operacion'])) {
  switch ($_GET['operacion']) {
    case 'getAllPublisher':
      echo json_encode($publisher->getAllPublisher());
      break;
  }
}
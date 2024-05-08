<?php
require_once '../models/ListSuperhero.php';

$superhero = new Superhero();

if (isset($_GET['operacion'])) {
    switch ($_GET['operacion']) {
        case 'getSuperhero':
            echo json_encode($superhero->getSuperhero());
            break;

        case 'getDataId':
            $query = ['idSuperhero' => $_GET['idSuperhero']];
            echo json_encode($superhero->getDataId($query));
            break;
    }
}

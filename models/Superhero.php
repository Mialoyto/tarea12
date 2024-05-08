<?php

require_once 'Conexion.php';

class Superhero extends Conexion
{
  private $pdo;


  public function __CONSTRUCT()
  {
    $this->pdo = parent::getConexion();
  }

  public function getAll($params = [])
  {
    try {
      $query = $this->pdo->prepare("CALL spu_superhero_by_publisher (?)");
      $query->execute(
        array($params['publisher_id'])
      );
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getFilter($params = [])
  {
    try {
      $query = $this->pdo->prepare("CALL spu_filter_pgl (? ,? ,?)");
      $query->execute(
        array(
          $params['publisher_id'],
          $params['gender_id'],
          $params['limite']
        )
      );
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}

/* 
$superhero = new Superhero();
$query =
  ['publisher_id' => 1];
echo json_encode($superhero->getAll($query)); */
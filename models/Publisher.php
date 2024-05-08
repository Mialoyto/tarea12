<?php

require_once 'Conexion.php';

class Publisher extends Conexion
{
  private $pdo;
  public function __construct()
  {
    $this->pdo = parent::getConexion();
  }

  public function getAllPublisher()
  {
    try {
      $query = $this->pdo->prepare("CALL spu_publisher_all()");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  public function getPublisherId($params = [])
  {
    try {
      $query = $this->pdo->prepare("CALL spu_listar_idpublisher(?)");
      $query->execute(
        array($params['publisher_id'])
      );
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}

/* $obj = new Publisher();
$query = ['publisherid' => '14'];
echo json_encode($obj->getPublisherId($query)); */
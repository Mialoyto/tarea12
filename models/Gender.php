<?php

require_once 'Conexion.php';

class Gender extends Conexion
{
  private $pdo;
  public function __construct()
  {
    $this->pdo = parent::getConexion();
  }
public function getGender()
  {
    try {
      $query = $this->pdo->prepare("CALL spu_gender_all()");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
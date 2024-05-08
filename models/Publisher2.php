<?php
require_once 'Conexion.php';
// 
class Publisher extends Conexion
{
  private $pdo;
  public function __construct()
  {
    $this->pdo = parent::getConexion();
  }


  /**
   * Retorna una lista conteniendo todos los PUBLISHER y los totales de acuerdo a los superheroes
   * @return array Retorna un arreglo asociativo conteniendo el resultado de la consulta
   */
  public function getAll()
  {
    try {
      $query = $this->pdo->prepare("SELECT * FROM vs_publisher_count");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
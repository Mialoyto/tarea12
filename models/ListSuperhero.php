<?php


require_once 'Conexion.php';
class Superhero extends Conexion
{
    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }

    public function getSuperhero()
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM vs_superhero_id");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getDataId($params = [])
    {
        try {
            $query = $this->pdo->prepare("CALL spu_serachDataId_mod (?)");
            $query->execute(
                array($params['idSuperhero'])
            );
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo ($e->getMessage());
        }
    }
}

/* $data = new Superhero();
$query = ['idSuperhero' => 1];
echo json_encode($data->getDataId($query)); */
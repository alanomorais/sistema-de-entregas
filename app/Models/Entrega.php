<?php

namespace App\Models;

use App\Db\Connect;
use PDOException;

class Entrega extends Connect
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_entrega';
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $query = $this->connection->query($sql);
        $this->execute($query,array_values($query));

        return $this->connection->lastInsertId();
    }

    public function execute($query, $params = [])
    {
        try {
            $statatement = $this->connection->prepare($query);
            $statatement->execute($params);

            return $statatement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}

$model = new Entrega();

return $model->getAll();
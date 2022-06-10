<?php

namespace App\Model;

use PDOException;
use App\Db\Database;

class Entrega extends Database
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
        $resultQuery = $query->fatchAll($query);

        return $resultQuery;
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

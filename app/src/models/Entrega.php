<?php

namespace App\Models;

use PDOException;
use Db\Database;


class Entrega extends Database
{
    private $table;

    private $id;
    private $titulo;
    private $descricao;
    private $data_previsao;
    private $data_entrega;
    private $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function geTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->id = $titulo;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->id = $descricao;

        return $this;
    }

    public function getPrevisao()
    {
        return $this->data_previsao;
    }

    public function setPrevisao($previsao)
    {
        $this->id = $previsao;

        return $this;
    }

    public function getEntrega()
    {
        return $this->data_entrega;
    }

    public function setEntrega($entrega)
    {
        $this->id = $entrega;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->id = $status;

        return $this;
    }


    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_entrega';
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $query = $this->connection->query($sql);
        $resultQuery = $query->fetchAll();

        return $resultQuery;
    }

    public function insert()
    {
        $sql = "INSERT INTO {$this->table} ('titulo','descricao', 'previsao_entrega', 'data_entrega', 'status') VALUES (':titulo',':descricao', ':previsao_entrega', ':data_entrega', ':status')";
        //$this->titulo,$this->descricao,$this->data_previsao,$this->data_entrega, $this->status
        $statatement = $this->connection->prepare($sql);
        $statatement->bindParam(':titulo', $this->titulo);
        $statatement->bindParam(':descricao', $this->descricao);
        $statatement->bindParam(':data_previsao', $this->data_previsao);
        $statatement->bindParam(':data_entrega', $this->data_entrega);
        $statatement->bindParam(':status', $this->status);
        $statatement->execute();

        return $this->connection->lastInsertId();
    }

    public function execute($query, $params = [])
    {
        try {
            $statatement = $this->connection->prepare($query);
            $statatement->execute($params);

            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}

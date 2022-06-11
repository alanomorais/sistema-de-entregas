<?php

namespace App\Models;

use PDO;
use PDOException;
use Db\Database;


class Entrega extends Database
{
    private $table;

    private $id;
    private $titulo;
    private $descricao;
    private $previsao_entrega;
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

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getPrevisao()
    {
        return $this->previsao_entrega;
    }

    public function setPrevisao($previsao)
    {
        $this->previsao_entrega = $previsao;

        return $this;
    }

    public function getEntrega()
    {
        return $this->data_entrega;
    }

    public function setEntrega($entrega)
    {
        $this->data_entrega = $entrega;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

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
        
        $sql = "INSERT INTO {$this->table} (titulo,descricao,previsao_entrega) VALUES (:titulo,:descricao,:previsao_entrega)";
        //$this->titulo,$this->descricao,$this->previsao_entrega,$this->data_entrega, $this->status
        $statatement = $this->connection->prepare($sql);
        $statatement->bindParam(':titulo',$this->titulo);
        $statatement->bindParam(':descricao',$this->descricao);
        $statatement->bindParam(':previsao_entrega',$this->previsao_entrega);
        $statatement->execute();

        return $this->connection->lastInsertId();
    }

    public function execute1($query, $params = [])
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

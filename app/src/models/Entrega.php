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

    public function setEntrega($entrega = null)
    {
        $this->data_entrega = $entrega;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status = 0)
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

    public function show()
    {
        try {
            $sql = "SELECT * FROM {$this->table} where id = {$this->id}";
            $query = $this->connection->query($sql);
            $resultQuery = $query->fetchAll();
    
            return $resultQuery;

        } catch (PDOException $e) {
            $response = [
                'success' => false,
                'message' => "erro ao inserir a entrega!",
                'mesg_error' => $e->getMessage(),
            ];
        }
    }

    public function insert()
    {
        try {
            $sql = "INSERT INTO {$this->table} (titulo,descricao,previsao_entrega) VALUES (:titulo,:descricao,:previsao_entrega)";

            $statatement = $this->connection->prepare($sql);
            $statatement->bindParam(':titulo', $this->titulo);
            $statatement->bindParam(':descricao', $this->descricao);
            $statatement->bindParam(':previsao_entrega', $this->previsao_entrega);
            $statatement->execute();

            $response = [
                'success' => true,
                'message' => "entrega inserida com sucesso",
                'id' => $this->connection->lastInsertId()
            ];

            return $response;
        } catch (PDOException $e) {

            $response = [
                'success' => false,
                'message' => "erro ao inserir a entrega!",
                'mesg_error' => $e->getMessage(),
            ];

            return $response;
        }
    }

    public function update()
    {
        try {
            $sql = "UPDATE {$this->table} SET titulo = :titulo ,descricao = :descricao, previsao_entrega = :previsao_entrega, data_entrega = :data_entrega , status = :status WHERE id = :id";

            $statatement = $this->connection->prepare($sql);
            $statatement->bindParam(':id', $this->id);
            $statatement->bindParam(':titulo', $this->titulo);
            $statatement->bindParam(':descricao', $this->descricao);
            $statatement->bindParam(':previsao_entrega', $this->previsao_entrega);
            $statatement->bindParam(':data_entrega', $this->data_entrega);
            $statatement->bindParam(':status', $this->status);
            $statatement->execute();

            $response = [
                'success' => true,
                'message' => "entrega atualizada com sucesso",
            ];

            return $response;
        } catch (PDOException $e) {

            $response = [
                'success' => false,
                'message' => "erro ao inserir a entrega!",
                'mesg_error' => $e->getMessage(),
            ];

            return $response;
        }
    }

    public function delete()
    {
        try {
            $sql = "delete from  {$this->table} WHERE id = :id";

            $statatement = $this->connection->prepare($sql);
            $statatement->bindParam(':id', $this->id);
            $statatement->execute();

            $response = [
                'success' => true,
                'message' => "entrega atualizada com sucesso",
            ];

            return $response;
        } catch (PDOException $e) {

            $response = [
                'success' => false,
                'message' => "erro ao inserir a entrega!",
                'mesg_error' => $e->getMessage(),
            ];

            return $response;
        }
    }

   
}

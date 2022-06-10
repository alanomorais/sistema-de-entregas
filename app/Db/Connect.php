<?php

namespace App\Db;

use PDO;
use PDOException;

class Connect
{
    const DB_HOST = 'localhost';
    const DB_PORT = '5432';
    const DB_NAME = 'entrega';
    const DB_USER = 'root';
    const DB_PASS = '321321321';

    private $connection;

    public function __construct()
    {
        $this->connectDatabase();
    }

    function connectDatabase()
    {
        try {
            //$this->connection = new PDO('pgsql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME,self::DB_USER,self::DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->connection;

        } catch (PDOException $e) {

            die('Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado <br />' . $e->getMessage());
        }
    }
}

<?php

namespace App\Db;

use PDO;
use PDOException;

class Connect
{
    const HOST = 'localhost';
    const PORT = 'localhost';
    const NAME = 'entrega';
    const USER = 'root';
    const PASS = '321321321';

    private $connection;

    public function __construct()
    {
        $this->connectDatabase();
    }

    function connectDatabase()
    {
        try {
            //$this->connection = new PDO('pgsql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            
            die('Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado <br />' . $e->getMessage());
        }
    }
}

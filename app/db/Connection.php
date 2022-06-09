<?php

namespace App\Db;

use PDO;
use PDOException;

class Connect{
    const HOST = 'localhost';
    const NAME = 'entrega';
    const USER = 'root';
    const PASS = '321321321';
    
    private $connection;

    public function __construct()
    {
        $this->connectDatabase();
    }

    private function connectDatabase()
    {
        $this->connection = new 
    }
}
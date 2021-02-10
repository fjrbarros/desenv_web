<?php

namespace App\db;

use \PDO;
use \PDOException;

class Database
{
    const host = 'localhost';
    const name = 'desenv_web';
    const user = 'root';
    const pass = 'barros123';

    private $table;
    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::host . ';dbname=' . self::name, self::user, self::pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'insert into ' . $this->table . ' (' . implode(',', $fields) . ') values (' . implode(',', $binds) . ')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? 'where ' . $where : '';
        $order = strlen($order) ? 'order by ' . $order : '';
        $limit = strlen($limit) ? 'limit ' . $limit : '';

        $query = 'select ' . $fields . ' from ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($query);
    }
}

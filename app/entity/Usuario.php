<?php

namespace App\entity;

use \PDO;

use \App\db\Database;

class Usuario
{
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $cliente = "S";
    public $administrador = "N";
    public $dataCadastro;

    public function cadastrar()
    {
        $this->data = date('Y-m-d H:i:s');

        $database = new Database('usuario');

        $this->id = $database->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
            'cliente' => $this->cliente,
            'administrador' => $this->administrador,
            'data_cadastro' => $this->dataCadastro
        ]);

        return true;
    }

    public static function getUsuarios($where = null, $order = null, $limit = null)
    {
        return (new Database('usuario'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}

<?php

namespace App\entity;

use \App\db\Database;

class Usuario
{
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $cliente;
    public $administrador;
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
}

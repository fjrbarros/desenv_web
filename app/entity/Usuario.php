<?php

namespace App\entity;

use \PDO;

use \App\db\Database;

//Classe de usuário.
class Usuario
{
    public $id;
    public $nome;
    public $estado;
    public $cidade;
    public $email;
    public $senha;
    public $cliente = "S";
    public $administrador = "N";
    public $data_cadastro;

    //Função responsável por preparar os dados para salvar.
    public function cadastrar()
    {
        $this->data_cadastro = date('Y-m-d H:i:s');

        //Cria uma nova instância do banco de dados.
        $database = new Database('usuario');

        $this->id = $database->insert([
            'nome' => $this->nome,
            'estado' => $this->estado,
            'cidade' => $this->cidade,
            'email' => $this->email,
            'senha' => $this->senha,
            'cliente' => $this->cliente,
            'administrador' => $this->administrador,
            'data_cadastro' => $this->data_cadastro
        ]);

        return true;
    }

    //Função responsável por preparar os dados para atualizar.
    public function atualizar()
    {
        return (new Database('usuario'))->update('id =' . $this->id, [
            'nome' => $this->nome,
            'estado' => $this->estado,
            'cidade' => $this->cidade,
            'email' => $this->email,
            'senha' => $this->senha,
            'cliente' => $this->cliente,
            'administrador' => $this->administrador,
            'data_cadastro' => $this->data_cadastro
        ]);
    }

    //Função responsável para efetuar login.
    public function login()
    {
        $where = " usuario.email = " . "'$this->email'" . " and usuario.senha = " . "'$this->senha'";

        return (new Database('usuario'))->select($where)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    //Função responsável por excluir um usuário.
    public function excluir()
    {
        return (new Database('usuario'))->delete('id = ' . $this->id);
    }

    //Função responsável por recuperar todos usuários.
    public static function getUsuarios($where = null, $order = null, $limit = null)
    {
        return (new Database('usuario'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    //Função responsável por recuperar um usuário específico.
    public static function getUsuarioId($id)
    {
        return (new Database('usuario'))->select('id = ' . $id)->fetchObject(self::class);
    }
}

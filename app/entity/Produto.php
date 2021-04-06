<?php

namespace App\entity;

use \PDO;

use \App\db\Database;

class Produto
{
    public $id;
    public $nome;
    public $descricao;
    public $valor;

    public function cadastrar()
    {
        //Cria uma nova instância do banco de dados.
        $database = new Database('produto');

        $this->id = $database->insert([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'valor' => $this->valor
        ]);

        return true;
    }

    public static function getProdutos($where = null, $order = null, $limit = null)
    {
        return (new Database('produto'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getProdutoId($id)
    {
        return (new Database('produto'))->select('id = ' . $id)->fetchObject(self::class);
    }

    public function excluir()
    {
        return (new Database('produto'))->delete('id = ' . $this->id);
    }

    public function atualizar()
    {
        return (new Database('produto'))->update('id =' . $this->id, [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'valor' => $this->valor
        ]);
    }
}

<?php

namespace App\DAO;

use \PDO;

use App\Model\ProdutoModel;

class ProdutoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Insert(ProdutoModel $model)
    {
        $sql = 'INSERT INTO produto (descricao, preco, estoque) VALUES (?, ?, ?)';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->estoque);

        $stmt->execute();
    }

    public function Update(ProdutoModel $model)
    {
        $sql = 'UPDATE produto SET descricao = ?, preco = ?, estoque = ? WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->estoque);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();
    }

    public function Select()
    {
        $sql = 'SELECT * FROM produto';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function SearchById($id)
    {
        $sql = 'SELECT * FROM produto WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        $objeto = $stmt->fetchObject('App\Model\ProdutoModel');
        
        return is_object($objeto) ? $objeto : new ProdutoModel();
    }

    public function SearchByName()
    {
        $sql = '';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();
    }

    public function Delete($id)
    {
        $sql = 'DELETE FROM produto WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}
<?php

namespace App\DAO;

use App\Model\ServicoModel;
use \PDO;

class ServicoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Insert(ServicoModel $model)
    {
        $sql = 'INSERT INTO servico (descricao, valor_servico) VALUES (?, ?);';

        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->valor_servico);

        $stmt->execute();
    }

    public function Update(ServicoModel $model)
    {
        $sql = 'UPDATE servico SET descricao = ?, valor_servico = ? WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->valor_servico);
        $stmt->bindValue(3, $model->id);

        $stmt->execute();
    }

    public function Select()
    {
        $sql = 'SELECT * FROM servico';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function SearchById($id)
    {
        $sql = 'SELECT * FROM servico WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        $objeto = $stmt->fetchObject('App\Model\ServicoModel');

        return is_object($objeto) ? $objeto : new ServicoModel();
    }

    public function Delete($id)
    {
        $sql = 'DELETE FROM servico WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}
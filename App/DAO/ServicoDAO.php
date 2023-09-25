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
        $sql = 'INSERT INTO servico (data_servico, descricao, id_cliente) VALUES (?, ?, ?);';

        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->data_servico);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->id_cliente);

        $stmt->execute();
    }

    public function Update(ServicoModel $model)
    {

    }

    public function Select()
    {
        $sql = 'SELECT * FROM view_servico;';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function SearchById($id)
    {

    }

    public function Delete($id)
    {

    }
}
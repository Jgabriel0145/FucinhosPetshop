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

        $id_servico = $this->conexao->lastInsertId();

        $sql2 = 'INSERT INTO funcionario_servico_assoc (id_funcionario, id_servico) VALUES (?, ?);';
        
        $stmt2 = $this->conexao->prepare($sql);

        $stmt2->bindValue(1, $model->id_funcionario);
        $stmt2->bindValue(2, $id_servico);

        $stmt->execute();
    }

    public function Update(ServicoModel $model)
    {

    }

    public function Select()
    {
        /*$sql = 'SELECT s.*, c.id AS cliente_id, c.nome AS cliente, c.cpf, c.telefone, c.data_nascimento, c.endereco FROM servico s
        JOIN cliente c ON (s.id = c.id);';*/

        $sql = 'SELECT * FROM db_petshop.view_servico;';

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
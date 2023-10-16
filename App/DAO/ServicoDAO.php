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
        $sql = 'INSERT INTO servico (data_servico, descricao, id_cliente, id_funcionario) VALUES (?, ?, ?, ?);';

        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->data_servico);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->id_cliente);
        $stmt->bindValue(4, $model->id_funcionario);

        $stmt->execute();

        $id_servico = $this->conexao->lastInsertId();

        /*$sql2 = 'INSERT INTO funcionario_servico_assoc (id_funcionario, id_servico) VALUES (?, ?);';
        
        $stmt2 = $this->conexao->prepare($sql2);

        $stmt2->bindValue(1, $model->id_funcionario);
        $stmt2->bindValue(2, $id_servico);

        $stmt2->execute();*/
    }

    public function Update(ServicoModel $model)
    {
        $sql = 'UPDATE servico SET data_servico = ?, descricao = ?, id_cliente = ?, id_funcionario = ? WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->data_servico);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->id_cliente);
        $stmt->bindValue(4, $model->id_funcionario);
        $stmt->bindValue(5, $model->id);

        $stmt->execute();
    }

    public function Select()
    {
        $sql = 'SELECT s.*, c.id as cliente_id, c.nome as cliente, c.cpf as cpf_cliente, c.telefone, c.data_nascimento, c.endereco, f.id as funcionario_id, f.nome as funcionario, f.cpf as cpf_funcionario, f.email, f.senha, f.admin FROM servico s
                JOIN cliente c ON (s.id_cliente = c.id)
                JOIN funcionario f ON (s.id_funcionario = f.id);';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function SearchById($id)
    {
        $sql = 'SELECT s.*, c.id as cliente_id, c.nome as cliente, c.cpf as cpf_cliente, c.telefone, c.data_nascimento, c.endereco, f.id as funcionario_id, f.nome as funcionario, f.cpf as cpf_funcionario, f.email, f.senha, f.admin FROM servico s
                JOIN cliente c ON (s.id_cliente = c.id)
                JOIN funcionario f ON (s.id_funcionario = f.id)
                WHERE s.id = ?';

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
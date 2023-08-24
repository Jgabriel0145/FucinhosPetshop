<?php

namespace App\DAO;

use App\Model\ClienteModel;
use \PDO;

class ClienteDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Insert(ClienteModel $model)
    {
        $sql = 'INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco) VALUES (?, ?, ?, ?, ?)';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->endereco);

        $stmt->execute();
    }

    public function Update(ClienteModel $model)
    {
        $sql = 'UPDATE cliente SET nome = ?, cpf = ?, telefone = ?, data_nascimento = ?, endereco = ? WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->endereco);
        $stmt->bindValue(6, $model->id);

        $stmt->execute();
    }

    public function Select()
    {
        $sql = 'SELECT * FROM cliente ORDER BY cliente.id';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, 'App\Model\ClienteModel');
    }

    public function SearchById($id) : ClienteModel
    {
        $sql = 'SELECT * FROM cliente WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        $objeto = $stmt->fetchObject('App\Model\ClienteModel');

        return is_object($objeto) ? $objeto : new ClienteModel();
    }

    public function SearchByName($query)
    {
        $str_query = ['filtro' => '%' . $query . '%'];

        $sql = 'SELECT * FROM cliente WHERE nome LIKE :filtro ORDER BY cliente.nome';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute($str_query);

        return $stmt->fetchAll(DAO::FETCH_CLASS, 'App\Model\ClienteModel');
    }

    public function Delete($id)
    {
        $sql = 'DELETE FROM cliente WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}
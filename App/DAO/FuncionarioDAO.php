<?php

namespace App\DAO;

use App\Model\FuncionarioModel;

class FuncionarioDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Insert(FuncionarioModel $model)
    {
        $sql = 'INSERT INTO funcionario (nome, cpf, email, senha, admin) VALUES (?, ?, ?, SHA1(?), ?);';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->senha);
        $stmt->bindValue(5, $model->admin);

        $stmt->execute();
    }

    public function Update(FuncionarioModel $model)
    {
        $sql = 'UPDATE funcionario SET nome = ?, cpf = ?, email = ?, senha = SHA1(?), admin = ? WHERE id = ?';
        
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->senha);
        $stmt->bindValue(5, $model->admin);
        $stmt->bindValue(6, $model->id);

        $stmt->execute();
    }
}
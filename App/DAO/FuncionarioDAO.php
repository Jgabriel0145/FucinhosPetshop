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

    public function Select()
    {
        $sql = 'SELECT * FROM funcionario;';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function SearchById($id)
    {
        $sql = 'SELECT * FROM funcionario WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        $objeto = $stmt->fetchObject('App\Model\FuncionarioModel');

        return is_object($objeto) ? $objeto : new FuncionarioModel();
    }

    public function SearchByName()
    {

    }

    public function Delete($id)
    {
        $sql = 'DELETE FROM funcionario WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }


    //Login
    public function SearchByEmailAndSenha($email, $senha)
    {
        $sql = 'SELECT * FROM funcionario WHERE email = ? AND senha = SHA1(?)';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);

        $stmt->execute();

        $objeto = $stmt->fetchObject('App\Model\FuncionarioModel');

        return is_object($objeto) ? $objeto : null;
    }
}
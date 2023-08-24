<?php

namespace App\DAO;

use \PDO;

use App\Model\AnimalModel;

class AnimalDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Insert(AnimalModel $model)
    {
        $sql = 'INSERT INTO animal (nome, raca, peso, porte, id_cliente) VALUES (?, ?, ?, ?, ?)';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->raca);
        $stmt->bindValue(3, $model->peso);
        $stmt->bindValue(4, $model->porte);
        $stmt->bindValue(5, $model->id_cliente);

        $stmt->execute();
    }

    public function Update(AnimalModel $model)
    {
        $sql = 'UPDATE animal SET nome = ?, raca = ?, peso = ?, porte = ?, id_cliente = ? WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->raca);
        $stmt->bindValue(3, $model->peso);
        $stmt->bindValue(4, $model->porte);
        $stmt->bindValue(5, $model->id_cliente);
        $stmt->bindValue(6, $model->id);

        $stmt->execute();
    }

    public function Select()
    {
        $sql = 'SELECT a.*, a.id as id_animal, a.nome as nome_animal, c.*, c.nome as nome_cliente FROM animal a JOIN cliente c ON (a.id_cliente = c.id) ORDER BY a.id;';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, 'App\Model\AnimalModel');
    }

    public function SearchById(int $id)
    {
        $sql = 'SELECT * FROM animal WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        $objeto = $stmt->fetchObject('App\Model\AnimalModel');

        return is_object($objeto) ? $objeto : new AnimalModel();
    }

    public function SearchByName(string $query)
    {
        $str_query = ['filtro' => '%' . $query . '%'];

        $sql = 'SELECT * FROM animal a JOIN cliente c ON (a.id_cliente = c.id) WHERE nome LIKE :filtro ORDER BY a.nome';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute($str_query);

        return $stmt->fetchAll(DAO::FETCH_CLASS, 'App\Model\AnimalModel');
    }

    public function Delete(int $id)
    {
        $sql = 'DELETE FROM animal WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}
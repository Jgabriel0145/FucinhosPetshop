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
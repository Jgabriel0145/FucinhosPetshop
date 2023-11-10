<?php

namespace App\DAO;

use App\Model\VendaModel;
use \PDO;

class VendaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Insert($carrinho, VendaModel $model)
    {
        $sql = 'INSERT INTO venda (valor_total_venda, id_cliente, id_funcionario) VALUES (?, ?, ?);';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $carrinho['total']);
        $stmt->bindValue(2, $model->id_cliente);
        $stmt->bindValue(3, $model->id_funcionario);

        $stmt->execute();

        $id_inserido = $this->conexao->lastInsertId();

        if (count($carrinho['produtos']) != 0)
        {
            foreach ($carrinho['produtos'] as $item)
            {
                $sql = 'INSERT INTO venda_itens_produto (id_produto, quantidade_produto, total_venda, id_venda) VALUES (?, ?, ?, ?)';

                $stmt = $this->conexao->prepare($sql);

                $stmt->bindValue(1, $item[5]);
                $stmt->bindValue(2, $item[2]);
                $stmt->bindValue(3, $item[4]);
                $stmt->bindValue(4, $id_inserido);

                $stmt->execute();
            }
        }

        if (count($carrinho['servicos']) > 0)
        {
            foreach ($carrinho['servicos'] as $item)
            {
                $sql = 'INSERT INTO venda_itens_servico (id_servico, quantidade_servico, valor_total, id_venda) VALUES (?, ?, ?, ?)';

                $stmt = $this->conexao->prepare($sql);

                $stmt->bindValue(1, $item[5]);
                $stmt->bindValue(2, $item[2]);
                $stmt->bindValue(3, $item[4]);
                $stmt->bindValue(4, $id_inserido);

                $stmt->execute();
            }
        }        
    }

    public function Select()
    {
        $sql = 'SELECT v.id, v.id AS numero_venda, v.valor_total_venda AS total_venda, c.nome AS cliente, f.nome AS funcionario, v.data_venda FROM venda v
                JOIN cliente c ON (v.id_cliente = c.id)
                JOIN funcionario f ON (v.id_funcionario = f.id)
                ORDER BY v.id;';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function SelectItens($id)
    {
        //Produtos
        $sql = 'SELECT v.id, v.id AS numero_venda, p.descricao AS produto, vp.quantidade_produto, vp.total_venda AS valor_total_produto, 
                c.nome AS cliente, f.nome AS funcionario, v.data_venda FROM venda_itens_produto vp
                JOIN venda v ON (vp.id_venda = v.id)
                JOIN produto p ON (vp.id_produto = p.id)
                JOIN cliente c ON (v.id_cliente = c.id)
                JOIN funcionario f ON (v.id_funcionario = f.id)
                WHERE v.id = ?;';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        $listagem['produtos'] = $stmt->fetchAll(DAO::FETCH_CLASS);

        //Serviços
        $sql = 'SELECT v.id, v.id AS numero_venda, s.descricao AS servico, vs.quantidade_servico, vs.valor_total AS valor_total_servico,
                c.nome AS cliente, f.nome AS funcionario, v.data_venda FROM venda_itens_servico vs
                JOIN venda v ON (vs.id_venda = v.id)
                JOIN servico s ON (vs.id_servico = s.id)
                JOIN cliente c ON (v.id_cliente = c.id)
                JOIN funcionario f ON (v.id_funcionario = f.id)
                WHERE v.id = ?;';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        $listagem['servicos'] = $stmt->fetchAll(DAO::FETCH_CLASS);

        return $listagem;
    }

    public function SearchById($id)
    {

    }

    public function Delete($id)
    {
        $sql = 'DELETE FROM venda WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

    public function AddCarrinho(VendaModel $model)
    {
        $sql = 'INSERT INTO carrinho_temporario (id_servico, tipo_venda, porte_animal, quantidade_servico, valor_servico, id_produto, quantidade_produto, valor_un_produto, valor_total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);';
    
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_servico_carrinho);
        $stmt->bindValue(2, $model->tipo_venda_carrinho);
        $stmt->bindValue(3, $model->porte_animal);
        $stmt->bindValue(4, $model->quantidade_servico_carrinho);
        $stmt->bindValue(5, $model->valor_servico_carrinho);
        $stmt->bindValue(6, $model->id_produto_carrinho);
        $stmt->bindValue(7, $model->quantidade_produto_carrinho);
        $stmt->bindValue(8, $model->valor_un_produto_carrinho);
        $stmt->bindValue(9, $model->valor_total_carrinho);

        $stmt->execute();
    }

    public function SelectCarrinho()
    {
        $sql_p = 'SELECT c.id, c.tipo_venda, c.quantidade_produto, c.valor_un_produto, c.valor_total,p.id as produto_id, p.descricao AS produto FROM carrinho_temporario c 
        JOIN produto p ON (c.id_produto = p.id)
        WHERE c.tipo_venda = "P";';

        $stmt = $this->conexao->prepare($sql_p);

        $stmt->execute();

        $produtos_carrinho = $stmt->fetchAll(DAO::FETCH_CLASS);

        $sql_s = 'SELECT c.id, c.tipo_venda, c.porte_animal, c.quantidade_servico, c.valor_servico, c.valor_total,s.id AS servico_id, s.descricao AS servico FROM carrinho_temporario c 
        JOIN servico s ON (c.id_servico = s.id)
        WHERE c.tipo_venda = "S"';

        $stmt = $this->conexao->prepare($sql_s);

        $stmt->execute();

        $servicos_carrinho = $stmt->fetchAll(DAO::FETCH_CLASS);

        $carrinho = [$produtos_carrinho, $servicos_carrinho];
        
        return $carrinho;
    }

    public function DeleteCarrinho($id)
    {

    }

    public function LimparCarrinho()
    {
        $sql = 'TRUNCATE carrinho_temporario;';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();
    }
}
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

    public function Insert(VendaModel $model)
    {
        $sql = 'INSERT INTO venda (id_itens_venda, id_cliente, id_funcionario) VALUES (?, ?, ?);';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_venda_itens);
        $stmt->bindValue(2, $model->id_cliente);
        $stmt->bindValue(3, $model->id_funcionario);

        $stmt->execute();
    }

    public function Update(VendaModel $model)
    {
        $sql = 'UPDATE venda SET id_itens_venda =?, id_cliente =?, id_funcionario =? WHERE id =?;';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_venda_itens);
        $stmt->bindValue(2, $model->id_cliente);
        $stmt->bindValue(3, $model->id_funcionario);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();
    }

    public function Select()
    {
        $sql = 'SELECT v.*, c.id AS cliente_id, c.nome AS cliente, c.cpf AS cpf_cliente, c.telefone, c.data_nascimento, c.endereco, 
                    f.id AS funcionario_id, f.nome AS funcionario, f.cpf AS cpf_funcionario, f.email, f.senha, f.admin, 
                    p.id AS produto_id, p.descricao AS descricao_produto, p.preco, p.estoque, 
                    s.id AS servico_id, s.data_servico, s.descricao as descricao_servico, s.id_cliente AS servico_cliente_id , s.id_funcionario AS servico_funcionario_id FROM venda v
                    JOIN venda_itens vi ON (v.id_venda_itens = vi.id)
                    JOIN cliente c ON (v.id_cliente = c.id)
                    JOIN funcionario f ON (v.id_funcionario = f.id)
                    JOIN produto p ON (vi.id_produto = p.id)
                    JOIN servico s ON (vi.id_servico = s.id);';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
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

    public function SaveCarrinho(VendaModel $model)
    {

    }

    public function SelectCarrinho()
    {

    }

    public function DeleteCarrinho($id)
    {

    }

    public function DeleteCarrinhoGeral()
    {
        $sql = 'TRUNCATE carrinho_temporario;';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();
    }
}
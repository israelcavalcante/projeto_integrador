<?php

include_once("../Conexao.php");

class venda
{
    protected $id_venda;
    protected $data_venda;
    protected $valorbruto_venda;
    protected $id_pedido;
    protected $id_cliente;

    /**
     * @return mixed
     */
    public function getIdPedido()
    {
        return $this->id_pedido;
    }

    /**
     * @param mixed $id_pedido
     */
    public function setIdPedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;
    }

    /**
     * @return mixed
     */
    public function getIdVenda()
    {
        return $this->id_venda;
    }

    /**
     * @param mixed $id_venda
     */
    public function setIdVenda($id_venda)
    {
        $this->id_venda = $id_venda;
    }

    /**
     * @return mixed
     */
    public function getDataVenda()
    {
        return $this->data_venda;
    }

    /**
     * @param mixed $data_venda
     */
    public function setDataVenda($data_venda)
    {
        $this->data_venda = $data_venda;
    }

    /**
     * @return mixed
     */
    public function getValorbrutoVenda()
    {
        return $this->valorbruto_venda;
    }

    /**
     * @param mixed $valorbruto_venda
     */
    public function setValorbrutoVenda($valorbruto_venda)
    {
        $this->valorbruto_venda = $valorbruto_venda;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @return mixed
     */

//    Métodos
    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "SELECT * FROM venda ";
        return $results = $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_venda)
    {
        $conexao = new Conexao();
        $sql = "SELECT * FROM venda WHERE id_venda = $id_venda";
        $dados = $conexao->recuperarDados($sql);

        $this->id_venda = $dados[0]['id_venda'];
        $this->data_venda = $dados[0]['data_venda'];
        $this->valorbruto_venda = $dados[0]['valorbruto_venda'];
        $this->id_pedido = $dados[0]['id_pedido'];
        $this->id_cliente = $dados[0] ['id_cliente'];
    }


    public function inserir($dados)
    {
        $data_venda = $dados['data_venda'];
        $valorbruto_venda = $dados['valorbruto_venda'];
        $id_pedido = $dados['id_pedido'];
        $id_cliente = $dados['id_cliente'];

        $conexao = new Conexao();


        $sql = " INSERT INTO venda (data_venda, valorbruto_venda, id_pedido, id_cliente) ";
        $sql .= " VALUES ('$data_venda','$valorbruto_venda','$id_pedido', '$id_cliente' )";


        return $conexao->executar($sql);
    }
    public function alterar($dados)
    {
        $id_venda = $dados ['id_venda'];
        $data_venda = $dados['data_venda'];
        $valorbruto_venda = $dados['valorbruto_venda'];
        $id_pedido = $dados['id_pedido'];
        $id_cliente = $dados['id_cliente'];

        $conexao = new Conexao();

        $sql = "UPDATE venda SET data_venda = '$data_venda', valorbruto_venda = '$valorbruto_venda', id_pedido = '$id_pedido', id_cliente = '$id_cliente' WHERE id_venda = $id_venda ";


        return $conexao->executar($sql);
    }

    public function excluir($id_venda)
    {
        $conexao = new Conexao();

        $sql = "DELETE from venda WHERE id_venda = '$id_venda'";

        return $conexao->executar($sql);
    }

}
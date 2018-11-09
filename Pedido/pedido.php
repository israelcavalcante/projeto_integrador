<?php

include_once("../Conexao.php");

class pedido
{
    protected $id_pedido;
    protected $qtd_livro;
    protected $id_livro;

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
    public function getQtdLivro()
    {
        return $this->qtd_livro;
    }

    /**
     * @param mixed $qtd_livro
     */
    public function setQtdLivro($qtd_livro)
    {
        $this->qtd_livro = $qtd_livro;
    }

    /**
     * @return mixed
     */
    public function getIdLivro()
    {
        return $this->id_livro;
    }

    /**
     * @param mixed $id_livro
     */
    public function setIdLivro($id_livro)
    {
        $this->id_livro = $id_livro;
    }


//    Métodos
    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "SELECT * FROM pedido ";
        return $results = $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_pedido)
    {
        $conexao = new Conexao();
        $sql = "SELECT * FROM pedido WHERE id_pedido = $id_pedido ";
        $dados = $conexao->recuperarDados($sql);

        $this->id_pedido = $dados[0]['id_pedido'];
        $this->qtd_livro = $dados[0]['qtd_livro'];
        $this->id_livro = $dados[0]['id_livro'];
    }


    public function inserir($dados)
    {
        $qtd_livro = $dados['qtd_livro'];
        $id_livro = $dados['id_livro'];

        $conexao = new Conexao();

        $sql = "INSERT INTO pedido (qtd_livro, id_livro)";
        $sql .= "VALUES ('$qtd_livro', '$id_livro')";


        return $conexao->executar($sql);
    }
    public function alterar($dados)
    {
        $id_pedido = $dados['id_pedido'];
        $qtd_livro = $dados['qtd_livro'];
        $id_livro = $dados ['id_livro'];

        $conexao = new Conexao();

        $sql = "UPDATE pedido SET qtd_livro = '$qtd_livro', id_livro = '$id_livro' WHERE id_pedido = $id_pedido ";

        return $conexao->executar($sql);
    }

    public function excluir($id_pedido)
    {
        $conexao = new Conexao();

        $sql = "DELETE from pedido WHERE id_pedido = '$id_pedido'";

        return $conexao->executar($sql);
    }

}
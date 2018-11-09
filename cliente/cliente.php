<?php

include_once("../Conexao.php");

class cliente
{
    protected $id_cliente;
    protected $nome;
    protected $rg;
    protected $cpf;
    protected $telefone;
    protected $rua;
    protected $cep;
    protected $uf;
    protected $cidade;
    protected $bairro;


    
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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param mixed $rg
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @param mixed $rua
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }





//    Métodos
    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "SELECT * FROM cliente ";
        return $results = $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_cliente)
    {
        $conexao = new Conexao();
        $sql = "SELECT * FROM cliente WHERE id_cliente = $id_cliente";
        $dados = $conexao->recuperarDados($sql);

        $this->id_cliente = $dados[0]['id_cliente'];
        $this->nome = $dados[0]['nome'];
        $this->rg = $dados[0]['rg'];
        $this->cpf = $dados[0]['cpf'];
        $this->telefone = $dados[0]['telefone'];
        $this->cep = $dados[0]['cep'];
        $this->rua = $dados[0]['rua'];
        $this->cidade = $dados[0]['cidade'];
        $this->bairro = $dados[0]['bairro'];
        $this->uf = $dados[0]['uf'];

    }


    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $rg = $dados['rg'];
        $cpf = $dados['cpf'];
        $telefone = $dados['telefone'];
        $rua = $dados['rua'];
        $cep = $dados['cep'];
        $cidade = $dados['cidade'];
        $bairro = $dados['bairro'];
        $uf = $dados['uf'];

        $conexao = new Conexao();

        $sql = "INSERT INTO cliente (nome, rg, cpf, rua, telefone, cep, cidade, bairro, uf )";
        $sql .= " VALUES ('$nome','$rg','$cpf','$rua','$telefone', '$cep', '$cidade', '$bairro', '$uf')";

        return $conexao->executar($sql);
    }
    public function alterar($dados)
    {
        $id_cliente = $dados['id_cliente'];
        $nome = $dados['nome'];
        $rg = $dados['rg'];
        $cpf = $dados['cpf'];
        $telefone = $dados['telefone'];
        $cep = $dados['cep'];
        $rua = $dados['rua'];
        $cidade = $dados['cidade'];
        $bairro = $dados['bairro'];
        $uf = $dados['uf'];
        $conexao = new Conexao();

        $sql = "UPDATE cliente SET nome = '$nome', rg = '$rg', cpf = '$cpf', telefone = '$telefone', cep = '$cep', rua = '$rua', cidade = '$cidade', bairro = '$bairro', uf = '$uf' WHERE id_cliente = $id_cliente";

        return $conexao->executar($sql);
    }

    public function excluir($id_cliente)
    {
        $conexao = new Conexao();

        $sql = "DELETE from cliente WHERE id_cliente = '$id_cliente'";

        return $conexao->executar($sql);
    }

    public function existeCpf($cpf)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(cpf) qtd FROM cliente WHERE cpf = '$cpf'";

        $dados =  $conexao->recuperarDados($sql);

        return (boolean) $dados[0]['qtd'];
    }

    public function existeRg($rg)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(rg) qtd FROM cliente WHERE rg = '$rg'";

        $dados =  $conexao->recuperarDados($sql);

        return (boolean) $dados[0]['qtd'];
    }
}
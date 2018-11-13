<?php

include_once("../Conexao.php");

class editora
{
    protected $id_editora;
    protected $nome_fantasia;
    protected $cnpj;
    protected $telefone;
    protected $email;
    protected $rua;
    protected $cep;
    protected $uf;
    protected $cidade;
    protected $bairro;
    /**
     * @return mixed
     */
    public function getIdEditora()
    {
        return $this->id_editora;
    }

    /**
     * @param mixed $id_editora
     */
    public function setIdEditora($id_editora)
    {
        $this->id_editora = $id_editora;
    }

    /**
     * @return mixed
     */
    public function getNomeFantasia()
    {
        return $this->nome_fantasia;
    }

    /**
     * @param mixed $nome_fantasia
     */
    public function setNomeFantasia($nome_fantasia)
    {
        $this->nome_fantasia = $nome_fantasia;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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

        $sql = "SELECT * FROM editora";
        return $results = $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_editora)
    {
        $conexao = new Conexao();
        $sql = "SELECT * FROM editora WHERE id_editora = $id_editora";
        $dados = $conexao->recuperarDados($sql);

        $this->id_editora = $dados[0]['id_editora'];
        $this->nome_fantasia = $dados[0]['nome_fantasia'];
        $this->cnpj = $dados[0]['cnpj'];
        $this->telefone = $dados[0]['telefone'];
        $this->email = $dados[0]['email'];
        $this->rua = $dados[0]['rua'];
        $this->cep = $dados[0]['cep'];
        $this->cidade = $dados[0]['cidade'];
        $this->bairro = $dados[0]['bairro'];
        $this->uf = $dados[0]['uf'];

    }


    public function inserir($dados)
    {
        $nome_fantasia = $dados['nome_fantasia'];
        $cnpj = $dados['cnpj'];
        $telefone = $dados['telefone'];
        $email = $dados['email'];
        $cep = $dados['cep'];
        $rua = $dados['rua'];
        $cidade = $dados['cidade'];
        $bairro = $dados['bairro'];
        $uf = $dados['uf'];

        $conexao = new Conexao();

        $sql = "INSERT INTO editora (nome_fantasia, cnpj, rua, telefone, email, cep, cidade, bairro, uf)";
        $sql .= " VALUES ('$nome_fantasia','$cnpj','$rua','$telefone', '$email', '$cep', '$cidade', '$bairro', '$uf' )";

        return $conexao->executar($sql);
    }
    public function alterar($dados)
    {
        $id_editora = $dados['id_editora'];
        $nome_fantasia = $dados['nome_fantasia'];
        $cnpj = $dados['cnpj'];
        $telefone = $dados['telefone'];
        $email = $dados['email'];
        $cep = $dados['cep'];
        $rua = $dados['rua'];
        $cidade = $dados['cidade'];
        $bairro = $dados['bairro'];
        $uf = $dados['uf'];
        $conexao = new Conexao();

        $sql = "UPDATE editora SET nome_fantasia = '$nome_fantasia', cnpj = '$cnpj', telefone = '$telefone', email = '$email', cep = '$cep', rua = '$rua', cidade = '$cidade', bairro = '$bairro', uf = '$uf' WHERE id_editora = $id_editora ";

        return $conexao->executar($sql);
    }

    public function excluir($id_editora)
    {
        $conexao = new Conexao();

        $sql = "DELETE from editora WHERE id_editora = '$id_editora'";

        return $conexao->executar($sql);
    }

    public function existeNome($nome_fantasia)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome_fantasia) qtd FROM editora WHERE nome_fantasia = '$nome_fantasia'";
//        $sql = "SELECT COUNT(titulo) qtd FROM eleitor WHERE titulo = '$titulo'";
        $dados =  $conexao->recuperarDados($sql);

        return (boolean) $dados[0]['qtd'];
    }

    public function existeEmail($email)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(email) qtd FROM editora WHERE email = '$email'";

        $dados =  $conexao->recuperarDados($sql);

        return (boolean) $dados[0]['qtd'];
    }
}
?>